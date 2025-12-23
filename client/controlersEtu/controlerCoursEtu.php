<?php
require_once("../modelEtu/modelCoursEtu.php");

function afficher_mes_cours_action() {
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: viewEtu/indexlog.php");
        exit();
    }

    $id_etudiant = $_SESSION["user"]["id_etudiant"];
    $mes_cours = select_cours_par_filiere($id_etudiant);
    $prof= select_prof() ;
   

    require_once("../viewEtu/CoursEtu.php");
}


?>
