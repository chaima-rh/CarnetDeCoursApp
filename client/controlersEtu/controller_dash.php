<?php
session_start();

require_once(__DIR__ . '/../modelEtu/forumMdel.php');
require_once(__DIR__ . '/../modelEtu/modelCoursEtu.php');
require_once(__DIR__ . '/../modelEtu/modelNoteEtu.php');


if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}





function post() {
    return getNombrePosts();
}

function doc() {
    return getNombreDocuments();
}

function note() {
    $id_etudiant = $_SESSION['user']['id_etudiant'];
    return  getMoyenneGenerale($id_etudiant);
}

function matiere() {
    $id_etudiant = $_SESSION['user']['id_etudiant'];
    return getNombreMatieresEtudiant($id_etudiant);
}
$nombre_posts = post();
$nombre_documents = doc();
$nombre_notes = note();
$nombre_matieres = matiere();








require_once(__DIR__ . '/../viewEtu/dashbord.php');


