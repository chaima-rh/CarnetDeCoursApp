<?php
require_once(__DIR__ . "/../../config/database.php");

function getPosts() {
    $pdo = connection_bd();
    $stmt = $pdo->query("
        SELECT p.contenu, p.date_post,
               e.nom AS nom_etudiant,
               m.nom_matiere
        FROM posts p
        JOIN etudiants e ON p.id_etudiant = e.id_etudiant
        JOIN matieres m ON p.id_matiere = m.id_matiere
        ORDER BY p.date_post DESC
    ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addPost($id_etudiant, $id_matiere, $contenu) {
    $pdo = connection_bd();
    $stmt = $pdo->prepare("INSERT INTO posts (id_etudiant, id_matiere, contenu) VALUES (:id_etudiant, :id_matiere, :contenu)");
    
    // bindParam exige que les variables existent AVANT l'appel à execute
    $stmt->bindParam(':id_etudiant', $id_etudiant, PDO::PARAM_INT);
    $stmt->bindParam(':id_matiere', $id_matiere, PDO::PARAM_INT);
    $stmt->bindParam(':contenu', $contenu, PDO::PARAM_STR);
    
    $stmt->execute();
}

function getMatieres() {
    $pdo = connection_bd();
    $stmt = $pdo->query("SELECT id_matiere, nom_matiere FROM matieres");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getNombrePosts() {
    $pdo = connection_bd();
    $stmt = $pdo->query("SELECT COUNT(*) AS total FROM posts");
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
