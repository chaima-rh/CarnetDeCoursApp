<?php

function connexion_db (){
    $host = 'localhost';
    $dbname='PROJET';
    $user= 'root';
    $password='';

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        die ("Erreur de connexion : " .$e ->getMessage());
    }
}

function ajouter_matiere(){
    $pdo = connexion_db();
    if(!empty($_POST['filiere']) && !empty($_POST['matiere']) && !empty($_POST['coef']) && !empty($_POST['prof']) ){
        $id_filiere = $_POST['filiere'];
        $matiere = $_POST['matiere'];
        $coef = $_POST['coef'];
        $prof = $_POST['prof'];


        $stmt = $pdo->prepare("SELECT COUNT(*) FROM matieres WHERE nom_matiere = :matiere AND id_professeur = :prof");
        $stmt->bindParam(':matiere',$matiere);
         $stmt->bindParam(':prof',$prof);
         $stmt->execute();

        if ($stmt->fetchColumn() > 0) {
            echo "<div class='alert alert-danger'>Cette matière avec ce professeur existe déjà.</div>";
            return false;
        }


        $stmt = $pdo->prepare("INSERT INTO matieres (nom_matiere, coefficient, id_professeur) VALUES (:nom_matiere, :coefficient, :professeur)");
            $stmt->bindParam(':nom_matiere', $matiere);
            $stmt->bindParam(':coefficient', $coef);
            $stmt->bindParam(':professeur', $prof);
            $stmt->execute();
            
          
            $id_matiere = $pdo->lastInsertId();
            
           
            $mat_fil = $pdo->prepare("INSERT INTO filiere_matiere (id_filiere, id_matiere) VALUES (:id_filiere, :id_matiere)");
            $mat_fil->bindParam(':id_filiere', $id_filiere);
            $mat_fil->bindParam(':id_matiere', $id_matiere);
            $mat_fil->execute();
            return true ;

    }
}



function select_filieres() {
    $pdo = connexion_db();
    $fil = $pdo->prepare("SELECT id_filiere, nom_filiere FROM filieres");
    $fil->execute();
    $res_fil = $fil->fetchAll(PDO::FETCH_ASSOC);
    return $res_fil;
}
function select_prof() {
    $pdo = connexion_db();
    $stmt = $pdo->prepare("SELECT id_professeur,nom_professeur FROM professeurs");
    $stmt->execute();
    $prof = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $prof;
}

function listes_doc_model (){

    $pdo = connexion_db();

    $stmt = $pdo->prepare("
        SELECT d.id_document, d.chemin, d.descr, m.nom_matiere 
        FROM documents d 
        LEFT JOIN matieres m ON d.id_matiere = m.id_matiere
    ");
    $stmt->execute();
    $resultat = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $resultat ;
}






function valider_donnees_matiere($filiere, $matiere, $coef, $prof) {
    return !empty($filiere) && !empty($matiere) && !empty($coef) && !empty($prof);
}


function select_matieres_ajout_doc(){
    $pdo = connexion_db();
   $stmt = $pdo->prepare("SELECT MIN(id_matiere) as id_matiere, nom_matiere FROM matieres GROUP BY nom_matiere");

    $stmt->execute(); 
    $matieres = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    return $matieres;
}

function insert_doc(){
    $pdo = connexion_db();
    
    if (!empty($_POST['matiere']) && isset($_FILES['cours'])) {
        $id_matiere = $_POST['matiere'];
        $descr = $_POST['descr'];
        $filename = basename($_FILES['cours']['name']);

        // Chemin relatif pour stocker en base de données (pour href)
        $cheminRelatif = "cours/" . $filename;

        // Chemin absolu sur le serveur
        $cheminAbsolu = __DIR__ . "/../../cours/" . $filename;

        // Vérifie si le dossier 'cours' existe, sinon on le crée
        if (!is_dir(__DIR__ . "/../../cours/")) {
            mkdir(__DIR__ . "/../../cours/", 0777, true);
        }

        // Déplace le fichier vers le bon dossier
        $upload = move_uploaded_file($_FILES['cours']['tmp_name'], $cheminAbsolu);

        if ($upload) {
            $stmt = $pdo->prepare("INSERT INTO documents (id_matiere, chemin, descr) 
                                   VALUES(:id_matiere, :chemin, :descr)");
            $stmt->bindParam(":id_matiere", $id_matiere);
            $stmt->bindParam(":chemin", $cheminRelatif); // pour href dans HTML
            $stmt->bindParam(":descr", $descr);
            $stmt->execute();
        } else {
            echo "<div class='alert alert-danger'>Erreur lors de l'envoi du fichier.</div>";
        }
    }
}


function delete_doc(){
    $pdo = connexion_db();

    $id_document = (int)$_GET['id'];

    
        // Récupérer le chemin du fichier avant suppression
        $sql = "SELECT chemin FROM documents WHERE id_document = $id_document";
        $stmt = $pdo->query($sql);
        $document = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if (!$document) {
            header("Location: index_liste_doc.php");
            exit();
        }
    
        // Supprimer le document de la base de données
        $sql = "DELETE FROM documents WHERE id_document = $id_document";
        $resultat = $pdo->exec($sql);
    
        if ($resultat) {
            // Supprimer le fichier physique si il existe
            if (!empty($document['chemin']) && file_exists($document['chemin'])) {
                unlink($document['chemin']);
            }
        
            header("Location: index_liste_doc.php");
        }
    
    


}

function getDocumentById($id_document) {
    $pdo = connexion_db();
    try {
        $sql = "SELECT d.*, m.nom_matiere FROM documents d 
                LEFT JOIN matieres m ON d.id_matiere = m.id_matiere 
                WHERE d.id_document = $id_document";
        $stmt = $pdo->query($sql);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return false;
    }
}

function updateDocument($pdo, $id_document, $id_matiere, $descr) {
    $pdo = connexion_db();
    try {
        $sql = "UPDATE documents SET id_matiere = $id_matiere, descr = '$descr' WHERE id_document = $id_document";
        $resultat = $pdo->exec($sql);
        return $resultat !== false;
    } catch (Exception $e) {
        return false;
    }
}

function getAllMatieres() {
    $pdo = connexion_db();
    try {
        $stmt = $pdo->prepare(" SELECT m.id_matiere, m.nom_matiere, m.coefficient, p.nom_professeur
        FROM matieres m
        JOIN professeurs p ON m.id_professeur = p.id_professeur
        ORDER BY m.nom_matiere");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        return [];
    }
}

function deleteMatiere($id_matiere) {
    $pdo = connexion_db();
    try {
        $stmt = $pdo->prepare("DELETE FROM matieres WHERE id_matiere = :id");
        $stmt->bindParam(':id', $id_matiere, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (Exception $e) {
        return false;
    }
}


function getMatiereById($id_matiere) {
    $pdo = connexion_db();
    $stmt = $pdo->prepare("SELECT * FROM matieres WHERE id_matiere =:id");
    $stmt->bindParam(':id', $id_matiere);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


function updateMatiere($id_matiere, $nom_matiere, $coefficient, $professeur) {
    $pdo = connexion_db();
    $stmt = $pdo->prepare("UPDATE matieres SET nom_matiere =:nom, coefficient =coef, id_professeur =:prof WHERE id_matiere =:id");
     $stmt->bindParam(':nom', $nom_matiere);
     $stmt->bindParam('coef', $coefficient);
     $stmt->bindParam(':prof',  $professeur);
     $stmt->bindParam(':id', $id_matiere);
    return $stmt->execute();
}



function getNombreDocuments() {
    $pdo = connection_bd();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM documents");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
function getNombreprof() {
    $pdo = connection_bd();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM professeurs");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

?>