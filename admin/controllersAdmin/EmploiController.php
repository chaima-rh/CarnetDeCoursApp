
<?php
class EmploiController {
    private $pdo;
    private $emploiModel;
    private $matiereModel;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->emploiModel = new EmploiModel($pdo);
        $this->matiereModel = new MatiereModel($pdo);
    }

   
   public function ajouter() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
        $id_matiere = $_POST['id_matiere'] ;
        $jour = $_POST['jour'] ;
        $heure_debut = $_POST['heure_debut'] ;
        $heure_fin = $_POST['heure_fin'] ;
        $salle = $_POST['salle'] ;
        $filiere = $_POST['filiere'] ;

       
        if ($_SESSION['user']){
            if (empty($_POST['id_filiere'])) {
                echo "<div class='alert alert-danger'>ereeur</div>";
                return;
            }
            $id_filiere = $_POST['id_filiere'];
        } else {
            if (!isset($_SESSION['id_filiere'])) {
                echo "<div class='alert alert-danger'>erreur</div>";
                return;
            }
            $id_filiere = $_SESSION['id_filiere'];
        }

       
        $ok = $this->emploiModel->ajouterCours($id_filiere, $id_matiere, $jour, $heure_debut, $heure_fin, $salle,$filiere );
        if ($ok) {
            echo "<div class='alert alert-success'>VALID</div>";
        } else {
            echo "<div class='alert alert-danger'>❌ </div>";
        }
    }

 
    $matieres = $this->matiereModel->getAll();
    $filieres = $this->matiereModel->getAllFilieres();


    include(__DIR__ . "/../viewsAdmin/emploi_du_temps/ajouter.php");
}


    public function liste() {
        if (!isset($_SESSION['user'])) {
            echo "<div class='alert alert-danger'>erreur/div>";
            return;
        }

        if ($_SESSION['user']) {
            $cours = $this->emploiModel->getAll();
        } elseif (isset($_SESSION['id_filiere'])) {
            $id_filiere = $_SESSION['id_filiere'];
            $cours = $this->emploiModel->getCoursParFiliere($id_filiere);
        } 

        include(__DIR__ . "/../viewsAdmin/emploi_du_temps/liste.php");
    }
}
?>