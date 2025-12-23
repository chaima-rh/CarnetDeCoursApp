<?php
require_once(__DIR__ ."/../../config/database.php");



function select_cours_par_filiere($id_etudiant) {
    $pdo = connection_bd();

    $sql = "SELECT 
    d.id_document, d.chemin, d.descr,
    m.nom_matiere,
    p.nom_professeur 
FROM documents d
JOIN matieres m ON d.id_matiere = m.id_matiere
JOIN filiere_matiere fm ON m.id_matiere = fm.id_matiere
JOIN etudiants e ON fm.id_filiere = e.id_filiere
JOIN professeurs p ON m.id_professeur = p.id_professeur
WHERE e.id_etudiant = :id_etudiant
ORDER BY m.nom_matiere";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_etudiant', $id_etudiant, PDO::PARAM_INT);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getNombreDocuments() {
    $pdo = connection_bd();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM documents");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function getNombreMatieresEtudiant($id_etudiant) {
    $pdo = connection_bd();
    $stmt = $pdo->prepare("
        SELECT COUNT(*) AS total
        FROM matieres m
        JOIN filiere_matiere fm ON m.id_matiere = fm.id_matiere
        JOIN etudiants e ON fm.id_filiere = e.id_filiere
        WHERE e.id_etudiant = :id_etudiant
    ");
    $stmt->bindParam(':id_etudiant', $id_etudiant, PDO::PARAM_INT);
    $stmt->execute();
    $res = $stmt->fetch(PDO::FETCH_ASSOC);
    return $res['total'];
}
function select_prof() {
    $pdo = connection_bd(); 
    $stmt = $pdo->prepare("SELECT id_professeur, nom_professeur FROM professeurs");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
