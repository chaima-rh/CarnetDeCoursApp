<?php
class MatiereModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

  
    public function getAllFilieres() {
        $sql = "SELECT * FROM filieres";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getMatieresByFiliere($id_filiere) {
        $sql = "SELECT m.* 
                FROM matieres m
                INNER JOIN filiere_matiere fm ON m.id_matiere = fm.id_matiere
                WHERE fm.id_filiere = :id_filiere";
                
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_filiere', $id_filiere);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

   
    public function getAll() {
        $sql = "SELECT * FROM matieres";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
