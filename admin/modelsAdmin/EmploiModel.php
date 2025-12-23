<?php
class EmploiModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

 
    public function getCoursParFiliere($id_filiere) {
        try {
            $sql = "SELECT e.*, m.nom_matiere AS matiere
                    FROM emplois_temps e
                    JOIN matieres m ON e.id_matiere = m.id_matiere
                    WHERE e.id_filiere = :id_filiere
                    ORDER BY FIELD(e.jour, 'Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'),
                             e.heure_debut";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_filiere', $id_filiere, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur lors de la récupération des cours : " . $e->getMessage());
            return [];
        }
    }

    
    public function ajouterCours($id_filiere, $id_matiere, $jour, $heure_debut, $heure_fin, $salle) {
        try {
         
            $sqlCheck = "SELECT COUNT(*) FROM emplois_temps
                         WHERE jour = :jour
                           AND salle = :salle
                           AND ( (heure_debut <= :heure_debut AND heure_fin > :heure_debut)
                                 OR (heure_debut < :heure_fin   AND heure_fin >= :heure_fin) )";

            $stmtCheck = $this->pdo->prepare($sqlCheck);
            $stmtCheck->bindParam(':jour',$jour);
            $stmtCheck->bindParam(':salle',$salle);
            $stmtCheck->bindParam(':heure_debut',$heure_debut);
            $stmtCheck->bindParam(':heure_fin',$heure_fin);
            $stmtCheck->execute();

            if ($stmtCheck->fetchColumn() > 0) {
                return false; 
            }

          
            $sql = "INSERT INTO emplois_temps (id_filiere, id_matiere, jour, heure_debut, heure_fin, salle)
                    VALUES (:id_filiere, :id_matiere, :jour, :heure_debut, :heure_fin, :salle)";

            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id_filiere',$id_filiere);
            $stmt->bindParam(':id_matiere',$id_matiere);
            $stmt->bindParam(':jour',$jour);
            $stmt->bindParam(':heure_debut',$heure_debut);
            $stmt->bindParam(':heure_fin',$heure_fin);
            $stmt->bindParam(':salle',$salle);

            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Erreur lors de l'ajout du cours : " . $e->getMessage());
            return false;
        }
    }

   
    public function getAll() {
        $sql = "SELECT e.*, m.nom_matiere, f.nom_filiere
                FROM emplois_temps e
                JOIN matieres m ON e.id_matiere = m.id_matiere
                JOIN filieres f ON e.id_filiere = f.id_filiere
                ORDER BY FIELD(jour, 'Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'),
                         heure_debut";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
