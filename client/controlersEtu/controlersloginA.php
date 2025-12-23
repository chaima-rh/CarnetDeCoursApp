<?php
require_once("../modelEtu/modelloginEtu.php");



function login_action() {
    global $error; 
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = getUserByEmail($email);

        if ($user && $password === $user["password"]) {
            session_start();
            $_SESSION['user'] = [
                "id_etudiant" => $user["id_etudiant"],
                "nom" => $user["nom"],
                "photo_profil" => $user["photo_profil"],
                "filiere" => $user["filiere"] 
            ];
            header("Location: ../viewEtu/index2.php");
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }
   
    return $error; 
}




