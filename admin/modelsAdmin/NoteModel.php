<?php
class NoteModel {
    private $pdo;

    public function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=projet", "root", "");
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

   
    public function getAllNotes() {
        $stmt = $this->pdo->query("
            SELECT n.id_note, n.id_etudiant, n.id_matiere, n.type_note, n.valeur,
                   e.nom AS nom_etudiant, m.nom_matiere
            FROM notes n
            JOIN etudiants e ON n.id_etudiant = e.id_etudiant
            JOIN matieres m ON n.id_matiere = m.id_matiere
            ORDER BY e.nom, m.nom_matiere
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ajouterNote($id_etudiant, $id_matiere, $type_note, $valeur) {
        $stmt = $this->pdo->prepare("
            INSERT INTO notes (id_etudiant, id_matiere, type_note, valeur)
            VALUES (:id_etudiant, :id_matiere, :type_note, :valeur)
        ");
        $stmt->bindParam(':id_etudiant',$id_etudiant);
        $stmt->bindParam(':id_matiere',$id_matiere);
        $stmt->bindParam(':type_note',$type_note);
        $stmt->bindParam(':valeur',$valeur);
        return $stmt->execute();
    }

    
    public function supprimerNote($id_note) {
        $stmt = $this->pdo->prepare("DELETE FROM notes WHERE id_note = :id_note");
        $stmt->bindParam(':id_note', $id_note);
        return $stmt->execute();
    }

   
    public function getNoteById($id_note) {
        $stmt = $this->pdo->prepare("SELECT * FROM notes WHERE id_note = :id_note");
        $stmt->bindParam(':id_note', $id_note);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    
    public function modifierNote($id_note, $id_etudiant, $id_matiere, $type_note, $valeur) {
        $stmt = $this->pdo->prepare("
            UPDATE notes 
            SET id_etudiant = :id_etudiant,
                id_matiere = :id_matiere,
                type_note = :type_note,
                valeur = :valeur
            WHERE id_note = :id_note
        ");
        $stmt->bindParam(':id_note',$id_note);
        $stmt->bindParam(':id_etudiant',$id_etudiant);
        $stmt->bindParam(':id_matiere',$id_matiere);
        $stmt->bindParam(':type_note',$type_note);
        $stmt->bindParam(':valeur',$valeur);
        return $stmt->execute();
    }
}
?>