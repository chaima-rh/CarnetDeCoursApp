<?php
require_once(__DIR__ ."/../../config/database.php");

function getUserByEmail($email) {
    $pdo = connection_bd();
 $sql = "SELECT e.id_etudiant, e.nom, e.photo_profil, e.password, f.nom_filiere AS filiere
        FROM etudiants e
        JOIN filieres f ON e.id_filiere = f.id_filiere
        WHERE e.email = :email";



    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    return $stmt->fetch();
}

