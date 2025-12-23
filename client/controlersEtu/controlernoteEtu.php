<?php
require_once("../modelEtu/modelNoteEtu.php");

function afficher_mes_notes_action() {
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: viewEtu/indexlog.php");
        exit();
    }

    $id_etudiant = $_SESSION["user"]["id_etudiant"];

   
    $mes_notes = select_mes_notes($id_etudiant);

    require_once("../viewEtu/NotesEtu.php");
}
?>
