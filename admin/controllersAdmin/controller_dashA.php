<?php
session_start();

require_once(__DIR__ . '/../modelsAdmin/choix_gestion_model.php');
require_once(__DIR__ . '/../modelsAdmin/NoteModel.php');
require_once(__DIR__ . '/../modelsAdmin/modelEtu.php');


if (!isset($_SESSION['user'])) {
    header("Location: ../login.php");
    exit();
}


function etudiant() {
    return getNombreetu();
}

function doc() {
    return getNombreDocuments();
}

function prof() {
    return getNombreprof();
}


$nombre_etu = etudiant();
$nombre_documents = doc();
$nombre_prof = prof();

// تحميل العرض
require_once(__DIR__ . '/../viewsAdmin/dashbord.php');
