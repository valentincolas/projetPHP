<?php
require_once 'ControllerUtilisateur.php';
require_once 'ControllerAddresse.php';
require_once 'ControllerCommande.php';
require_once 'ControllerProduit.php';
require_once 'ControllerPanier.php';
require_once 'ControllerContenuCommande.php';
if (isset($_GET["table"]) && isset($_GET["action"])){
    $table = $_GET["table"];
    $action = $_GET["action"];
    $table::$action(); 
} else {
    ControllerProduit::readAll();
}

?>

