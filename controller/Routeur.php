<?php
require_once 'ControllerUtilisateur.php';
if (isset($_GET["table"]) && isset($_GET["action"])){
    $table = $_GET["table"];
    $action = $_GET["action"];
    $table::$action(); 
} else {
    echo "Cette page n'existe pas";
}

?>

