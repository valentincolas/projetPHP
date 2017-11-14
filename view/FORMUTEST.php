<?php

require_once ("../model/ModelUtilisateur.php");

$tab_v = ModelUtilisateur::getUtilisateurById(3);

echo '<p> Utili: ' . $tab_v->getlogin() . '</p>';


?>