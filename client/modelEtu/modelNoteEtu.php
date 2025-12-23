<?php
require_once(__DIR__ ."/../../config/database.php");


function select_mes_notes($id_etudiant) {
    $pdo = connection_bd();

   $sql = "SELECT n.id_note, n.type_note, n.valeur, 
                   m.nom_matiere, m.coefficient,
                   p.nom_professeur
            FROM notes n
            JOIN matieres m ON n.id_matiere = m.id_matiere
            JOIN professeurs p ON m.id_professeur = p.id_professeur
            WHERE n.id_etudiant = :id_etudiant
            ORDER BY m.nom_matiere, n.type_note";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_etudiant', $id_etudiant);
    $stmt->execute();
    
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getMoyenneGenerale($id_etudiant) {
    $notes = select_mes_notes($id_etudiant);

    $total_points = 0;
    $total_coeff = 0;

    foreach ($notes as $note) {
        $total_points += $note['valeur'] * $note['coefficient'];
        $total_coeff += $note['coefficient'];
    }

    return ($total_coeff > 0) ? round($total_points / $total_coeff, 2) : 0;
}


?>
