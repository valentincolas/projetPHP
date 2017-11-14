<?php
require_once 'ControllerUtilisateur.php';
$action = $_GET["action"];
ControllerUtilisateur::$action(); 
?>

