<?php
require_once 'ControllerUtilisateur.php';
require_once 'ControllerProduit.php';
$table = $_GET["table"];
$action = $_GET["action"];
$table::$action(); 
?>

