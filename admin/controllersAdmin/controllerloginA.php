<?php
require_once(__DIR__ . "/../modelsAdmin/modelloginA.php");


function login_action() {
    $error="";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = getUserByEmail($email,$password);

        if ($user) {
            session_start();
            $_SESSION["user"] = $user;
            $_SESSION['nom'] = $user['nom'];
           header("Location: ../viewsAdmin/index_dash.php");
            exit();
        } else {
            $error = "Email ou mot de passe incorrect.";
        }
    }

    require_once(__DIR__ . "/../viewsAdmin/viewloginA.php");

}





