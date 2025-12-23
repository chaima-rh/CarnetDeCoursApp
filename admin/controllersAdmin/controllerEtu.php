<?php
require_once (__DIR__ . '/../modelsAdmin/modelEtu.php');

function display_action() {
    $resultat = display();
   
    include(__DIR__ . '/../viewsAdmin/etudiant/etudiant_display.php');
}

function create_action(){
    require_once(__DIR__ . '/../viewsAdmin/etudiant/etudiant_create.php');
}

function store_action(){
    create();
    header("Location: ../etudiant/indexEtu.php");
    exit();
}

function destroy_action(){
    destroy();
    header("Location: ../etudiant/indexEtu.php");
    exit();
}

function edit_action(){
    $u = select_by_id(); 
    require_once(__DIR__ . '/../viewsAdmin/etudiant/etudiant_edit.php');
}

function update_action(){
    edit();
    header("Location: ../etudiant/indexEtu.php");
    exit();
}
?>
