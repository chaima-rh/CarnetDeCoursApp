<?php
$path =(__DIR__ . "/../../controllersAdmin/controllerEtu.php");


if (file_exists($path)) {
    require_once($path);
    display_action();
} else {
    echo " dossier nexiste pas : $path";
}
?>