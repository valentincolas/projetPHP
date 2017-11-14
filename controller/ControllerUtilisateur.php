<?php
require_once('../lib/File.php');
require_once (File::build_path(array('model','ModelUtilisateur.php'))); // chargement du modèle
class ControllerUtilisateur {
    public static function read(){
        $u = ModelUtilisateur::getUtilisateurById($_GET['id']);
        if($u == false){
            require (File::build_path(array('view','Utilisateur','ErreurUtilisateurId.php')));
        } else {
            require (File::build_path(array('view','Utilisateur','UtilisateurDetail.php')));
        } 
    }
    
    public static function create(){
        require (File::build_path(array('view','Utilisateur','CreateUtilisateur.php')));
    }
    public static function created(){
        $i = 0;
        $tab_u = ModelUtilisateur::getAllUtilisateur();
        foreach ($tab_u as $u){
            if($u->getLogin() == $_POST['login']){$i = 1;}
        }
        if($i == 1){
            require (File::build_path(array('view','Utilisateur','ErreurUtilisateurSignup.php')));
        } else {
            $u = new ModelUtilisateur($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom']);
            $u->save();
        }
    }
    
    public static function login(){
        require (File::build_path(array('view','Utilisateur','LoginUtilisateur.php')));
    }
    public static function logined(){
        $i = 0;
        $tab_u = ModelUtilisateur::getAllUtilisateur();
        foreach ($tab_u as $u){
            if($u->getLogin() == $_POST['login'] && $u->getMdp() == MD5($_POST['mdp'])){$i = 1;}
        }
        if($i == 1){
            require (File::build_path(array('view','Utilisateur','TESTLOGIN.php')));
        } else {
            require (File::build_path(array('view','Utilisateur','ErreurUtilisateurLogin.php')));
        }
    }
}
?>

