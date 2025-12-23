<?php
require_once(__DIR__ ."/../../config/database.php");
function display(){
    $pdo=connection_bd();
    $stmt = $pdo->prepare("SELECT 
            e.id_etudiant,
            e.num_etudiant, 
            e.nom, 
            e.email, 
            e.photo_profil,
            e.password,
            e.id_filiere,
            f.nom_filiere 
        FROM etudiants e 
        INNER JOIN filieres f ON f.id_filiere = e.id_filiere
    ");
    $stmt->execute();
   $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result ;  
}

function create(){
    $pdo = connection_bd();

$num     = $_POST['num'];
$nom     = $_POST['nom'];
$email   = $_POST['email'];
$filiere = $_POST['filiere'];
$pswd    = $_POST['pswd'];


if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
    $nomOriginal = $_FILES['photo']['name'];
    $extension   = pathinfo($nomOriginal, PATHINFO_EXTENSION);
    $nomUnique   = uniqid('img_') . '.' . $extension;

    $dossier     = __DIR__ . "/../../images/";  
    $cheminFinal = $dossier . $nomUnique;

  
    if (!is_dir($dossier)) {
        mkdir($dossier, 0755, true);
    }

   
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $cheminFinal)) {
        $photo = $nomUnique;
    } else {
        die(" Erreur lors du téléchargement de l'image.");
    }
} else {
    $photo = "default.jpg"; 
}


$stmt = $pdo->prepare("
    INSERT INTO etudiants (num_etudiant, nom, email, id_filiere, photo_profil, password) 
    VALUES (:num, :nom, :email, :filiere, :photo, :pswd)
");

$stmt->bindParam(":num", $num);
$stmt->bindParam(":nom", $nom);
$stmt->bindParam(":email", $email);
$stmt->bindParam(":filiere", $filiere);
$stmt->bindParam(":photo", $photo); 
$stmt->bindParam(":pswd", $pswd);
$stmt->execute();
}
function destroy(){
    $pdo = connection_bd();

    $id = $_GET["id"];
    $stmt = $pdo->prepare("DELETE FROM etudiants WHERE id_etudiant = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}



   function edit(){
    $pdo = connection_bd();

    $id = $_POST["id"];
    $num = $_POST['num'] ;
    $nom = $_POST['nom'] ;
    $email = $_POST['email'];
    $filiere = $_POST['filiere'];
    $pswd = $_POST['pswd'] ;

    $stmt_old = $pdo->prepare("SELECT photo_profil FROM etudiants WHERE id_etudiant = :id");
    $stmt_old->bindParam(":id", $id);
    $stmt_old->execute();
    $old_photo = $stmt_old->fetchAll();

    
    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === 0) {
        $nomOriginal = $_FILES['photo']['name'];
        $extension   = pathinfo($nomOriginal, PATHINFO_EXTENSION);
        $nomUnique   = uniqid('img_') . '.' . $extension;

        $dossier     = __DIR__ . "/../../images/";  
        if (!is_dir($dossier)) {
            mkdir($dossier, 0755, true);
        }

        $cheminFinal = $dossier . $nomUnique;

        if (move_uploaded_file($_FILES['photo']['tmp_name'], $cheminFinal)) {
            $photo = $nomUnique;

            
            if ($old_photo && file_exists($dossier . $old_photo)) {
                unlink($dossier . $old_photo);
            }
        }
    } else {
        $photo = $old_photo;
    }

   
    $stmt = $pdo->prepare("UPDATE etudiants 
                           SET num_etudiant = :num, nom = :nom, email = :email, 
                               id_filiere = :filiere, photo_profil = :photo, password = :pswd 
                           WHERE id_etudiant = :id");

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":num", $num);
    $stmt->bindParam(":nom", $nom);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":filiere", $filiere);
    $stmt->bindParam(":photo", $photo);  // 
    $stmt->bindParam(":pswd", $pswd);
    $stmt->execute();
}

function select_by_id(){
    $pdo=connection_bd();
    $stmt=$pdo->prepare("SELECT * FROM etudiants WHERE id_etudiant=:id");
    $stmt->bindParam(":id",$_GET["id"]);
    $stmt->execute();
    $u=$stmt->fetchAll();
    return  $u;
}

function getNombreetu(){
       $pdo = connection_bd();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM etudiants");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
?>