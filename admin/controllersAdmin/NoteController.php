<?php
require_once(__DIR__ . "/../modelsAdmin/NoteModel.php");


class NoteController {
    private $model;

    public function __construct() {
        $this->model = new NoteModel();
    }

    public function liste() {
        $notes = $this->model->getAllNotes();
        include(__DIR__ . "/../viewsAdmin/note/liste.php");

    }

    public function ajouter() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (
                isset($_POST['id_etudiant'], $_POST['id_matiere'], $_POST['type_note'], $_POST['valeur']) &&
                !empty($_POST['id_etudiant']) &&
                !empty($_POST['id_matiere']) &&
                !empty($_POST['type_note']) &&
                is_numeric($_POST['valeur'])
            ) {
                $this->model->ajouterNote(
                    $_POST['id_etudiant'],
                    $_POST['id_matiere'],
                    $_POST['type_note'],
                    floatval($_POST['valeur'])
                );
                header('Location: indexNote.php?action=liste_notes');
                exit();
            } else {
                echo " Veuillez remplir tous les champs correctement.";
            }
        }
        include __DIR__ . '/../viewsAdmin/note/ajouter.php';
    }

    public function supprimer() {
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id_note = (int)$_GET['id'];
            $this->model->supprimerNote($id_note);
        }
        header('Location: indexNote.php?action=liste_notes');
        exit();
    }
public function modifier() {
    if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
        header('Location: indexNote.php?action=liste_notes');
        exit();
    }

    $id_note = (int)$_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (
            isset($_POST['id_etudiant'], $_POST['id_matiere'], $_POST['type_note'], $_POST['valeur']) &&
            is_numeric($_POST['valeur'])
        ) {
            $this->model->modifierNote(
                $id_note,
                $_POST['id_etudiant'],
                $_POST['id_matiere'],
                $_POST['type_note'],
                floatval($_POST['valeur'])
            );
            header('Location: indexNote.php?action=liste_notes');
            exit();
        } else {
            $message = " Remplissez correctement tous les champs.";
        }
    }

    $note = $this->model->getNoteById($id_note);
    include(__DIR__ . '/../viewsAdmin/note/modifier.php');
}

   
}