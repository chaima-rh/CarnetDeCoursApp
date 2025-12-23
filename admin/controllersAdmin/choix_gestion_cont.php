<?php
require_once(__DIR__ . "/../modelsAdmin/choix_gestion_model.php");



function ajouter_matiere_action(){
    $res_fil = select_filieres();
    $succes = ajouter_matiere();
    $prof = select_prof();
   require_once(__DIR__ . '/../viewsAdmin/choix_gestion/ajouter_matiere.php');


}


function listes_doc_action(){
    $resultat = listes_doc_model();
   require_once(__DIR__ . '/../viewsAdmin/choix_gestion/listes_doc.php');
   

}

function ajouter_doc_action(){
    $matieres = select_matieres_ajout_doc();
    insert_doc();
    
   require_once(__DIR__ . '/../viewsAdmin/choix_gestion/ajout_doc.php');
  

    
}

function delete_doc_action(){
    delete_doc();
}
function edit_action(){
    $prof = select_prof();
   
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index_liste_doc.php");
        exit();
    }
    
    $id_document = (int)$_GET['id'];
    
    
    $document = getDocumentById( $id_document);
    
    if (!$document) {
        header("Location: index_liste_doc.php?error=document_introuvable");
        exit();
    }
    
    
    $matieres = getAllMatieres();
    
    require_once(__DIR__ . '/../viewsAdmin/choix_gestion/edit_doc.php');

}

function update_action(){
    
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index_liste_doc.php?error=id_manquant");
        exit();
    }
    
    $id_document = (int)$_GET['id'];
    $id_matiere = $_POST['matiere'];
    $descr = $_POST['descr'];
    
    if (updateDocument(null, $id_document, $id_matiere, $descr)) {
        header("Location: index_liste_doc.php?success=document_modifie");
    } else {
        header("Location: index_liste_doc.php?error=erreur_modification");
    }
    exit();
}

function liste_matiere_action() {
    $matieres = getAllMatieres();
  require_once(__DIR__ . '/../viewsAdmin/choix_gestion/liste_matiere.php');

}

function delete_matiere_action() {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index_liste_matiere.php?error=id_manquant");
        exit();
    }

    $id_matiere = (int)$_GET['id'];

    if (deleteMatiere($id_matiere)) {
        header("Location: index_liste_matiere.php?success=suppression_effectuee");
    } else {
        header("Location: index_liste_matiere.php?error=suppression_echouee");
    }
    exit();
}

function edit_matiere_action() {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index_liste_matiere.php");
        exit();
    }
    $id_matiere = (int)$_GET['id'];
    $matiere = getMatiereById($id_matiere);
    if (!$matiere) {
        header("Location: index_liste_matiere.php?error=matiere_non_trouvee");
        exit();
    }
    $prof = select_prof();
  require_once(__DIR__ . '/../viewsAdmin/choix_gestion/edit_matiere.php');

}

function update_matiere_action() {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header("Location: index_liste_matiere.php?error=id_manquant");
        exit();
    }
    $id_matiere = (int)$_GET['id'];
    $nom_matiere = $_POST['nom_matiere'] ?? '';
    $coefficient = $_POST['coefficient'] ?? '';
    $professeur = $_POST['professeur'] ?? '';

    if (updateMatiere($id_matiere, $nom_matiere, $coefficient, $professeur)) {
        header("Location: index_liste_matiere.php?success=matiere_modifiee");
    } else {
        header("Location: index_liste_matiere.php?error=erreur_modification");
    }
    exit();
}




?>