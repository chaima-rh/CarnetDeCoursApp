<?php
require_once("../modelEtu/modelEmploiEtu.php");

function afficher_mon_emploi_du_temps() {
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: ../indexlog.php");
        exit();
    }

    $id_etudiant = $_SESSION["user"]["id_etudiant"];
    $emploi_temps = select_emploi_du_temps($id_etudiant);

    require_once("../viewEtu/EmploisEtu.php");
}
?>
