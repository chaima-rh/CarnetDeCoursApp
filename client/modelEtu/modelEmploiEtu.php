<?php
require_once(__DIR__ ."/../../config/database.php");


function select_emploi_du_temps($id_etudiant) {
    $pdo = connection_bd();

    $sql = "SELECT 
    e.jour, e.heure_debut, e.heure_fin, e.salle,
    m.nom_matiere,
    p.nom_professeur
   
FROM emplois_temps e
JOIN matieres m ON e.id_matiere = m.id_matiere
JOIN professeurs p ON m.id_professeur = p.id_professeur
JOIN etudiants et ON e.id_filiere = et.id_filiere
WHERE et.id_etudiant = :id_etudiant
ORDER BY FIELD(e.jour, 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi'),
         e.heure_debut;";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_etudiant', $id_etudiant, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
