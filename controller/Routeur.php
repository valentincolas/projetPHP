<?php
require_once 'ControllerUtilisateur.php';
$table = $_GET["table"];
$action = $_GET["action"];
$table::$action(); 
?>

