<?php
require_once(__DIR__ . "/../../controllersAdmin/NoteController.php");


$action = $_GET['action'] ?? 'liste_notes';

$controller = new NoteController();

switch ($action) {
    case 'liste_notes':
        $controller->liste();
        break;
    case 'ajouter_note':
        $controller->ajouter();
        break;
    case 'supprimer_note':   
        $controller->supprimer();
        break;
    case 'modifier_note':
        $controller->modifier();
    break;
    default:
        echo "Action inconnue.";
}
?>