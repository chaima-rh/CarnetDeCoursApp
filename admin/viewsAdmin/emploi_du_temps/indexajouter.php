<?php
session_start();

require_once(__DIR__ . "/../../../config/database.php");
require_once(__DIR__ . "/../../controllersAdmin/EmploiController.php");
require_once(__DIR__ . "/../../modelsAdmin/EmploiModel.php");
require_once(__DIR__ . "/../../modelsAdmin/MatiereModel.php");

$pdo = connection_bd();
$controller = new EmploiController($pdo);


$controller->ajouter();
?>
