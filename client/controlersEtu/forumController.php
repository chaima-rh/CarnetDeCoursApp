<?php
session_start();
require_once '../modelEtu/forumMdel.php';
$id_etudiant = $_SESSION['user']['id_etudiant']; // استخراج الرقم



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_matiere = $_POST['id_matiere'] ?? '';
    $contenu = $_POST['contenu'] ?? '';

    if ($id_etudiant && !empty($id_matiere) && !empty($contenu)) {
        addPost($id_etudiant, $id_matiere, $contenu);
        header("Location: index.php"); // redirection après ajout
        exit();
    }
}

$posts = getPosts();
$matieres = getMatieres();
require '../viewEtu/forumView.php';

function post_nbr(){
   $posts = getNombrePosts();
   require 'viewEtu/dashbord.php';
}
?>
