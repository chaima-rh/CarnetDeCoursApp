<?php
require_once(__DIR__ . "/../../controllersAdmin/choix_gestion_cont.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    update_action();
   
    
} else {
    
    edit_action();
    
}
?>