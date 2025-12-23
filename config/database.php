<?php
function connection_bd(){
    $host = 'localhost';
    $db   = 'projet';
    $user = 'root';
    $pass = ''; 

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$db",$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo; 
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données : " . $e->getMessage();
        exit;
    }
}
?>