<?php
require_once(__DIR__ ."/../../config/database.php");

function getUserByEmail($email,$password) {
    $pdo = connection_bd();
    $sql = "SELECT * FROM administration WHERE email =:email AND password =:password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":password",$password);
    $stmt->execute();
    $user=$stmt->fetch();
    return $user;
}