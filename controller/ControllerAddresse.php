<?php

require_once('../lib/File.php');
require_once (File::build_path(array('model', 'ModelAddresse.php'))); // chargement du modèle

class ControllerAddresse {

    public static function read() {
        $a = ModelAddresse::select($_GET['id']);
        if ($a == false) {
            $controller = "Addresse";
            $view = 'ErreurAddresseId';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view', 'view.php')));
        } else {
            $controller = "Addresse";
            $view = 'AddresseDetail';
            $pagetitle = 'Detail Adresse';
            require (File::build_path(array('view', 'view.php')));
        }
    }

    public static function readAll() {
        $tab_a = ModelAddresse::selectAll(); //appel au modèle pour gerer la BD
        $controller = "Addresse";
        $view = 'ListeAddresse';
        $pagetitle = 'Liste Adresse';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function create() {
        $controller = "Addresse";
        $view = 'CreateAddresse';
        $pagetitle = 'Creation Adresse';
        require (File::build_path(array('view', 'view.php')));
    }

    public static function created() {
        $i = 0;
        $tab_a = ModelAddresse::selectAll();
        foreach ($tab_a as $a) {
            if ($a->getVille() == $_POST['ville'] && $a->getCodePostal() == $_POST['codepostal'] && $a->getRue() == $_POST['rue'] && $a->getPays() == $_POST['pays']) {
                $i = 1;
            }
        }
        if ($i == 1) {
            $controller = "Addresse";
            $view = 'ErreurAddresseCreated';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view', 'view.php')));
        } else {
            $a = new ModelAddresse($_POST['rue'], $_POST['ville'], $_POST['codepostal'], $_POST['pays']);
            $a->save();
        }
        header('Location: ../controller/Routeur.php?table=ControllerAddresse&action=readAll');
    }

    public static function deleted() {
        $a = ModelAddresse::selectAll($_GET['id']);
        if ($a == false) {
            $controller = "Addresse";
            $view = 'ErreurAddresseId.php';
            $pagetitle = 'Erreur Adresse';
            require (File::build_path(array('view', 'view.php')));
        } else {
            ModelAddresse::delete($_GET['id']);
        }
    }

}
?>

