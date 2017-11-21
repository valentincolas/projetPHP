<?php
require_once('../lib/File.php');
require_once('../lib/Security.php');
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
            $nonce = generateRandomHex();
            $u = new ModelUtilisateur($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $nonce);
            $u->save();
            
            $to = $_POST['email'];
            $subject = "Verfication email";
            $message = "http://webinfo.iutmontp.univ-montp2.fr/~decadollem/ProjetPHP/controller/Routeur.php?table=ControllerUtilisateur&action=validate&id=" . ModelUtilisateur::getUtilisateurByLogin($_POST['login'])->getId() . "&nonce=" . $nonce;
            mail($to, $subject, $message);
            
        }
    }
    
    public static function login(){
        require (File::build_path(array('view','Utilisateur','LoginUtilisateur.php')));
    }
    public static function logined(){
        $i = 0;
        $tab_u = ModelUtilisateur::getAllUtilisateur();
        foreach ($tab_u as $u){
            if($u->getLogin() == $_POST['login'] && $u->getMdp() == MD5(ModelUtilisateur::getSeed() . $_POST['mdp'])){$i = 1;}
        }
        if($i == 1){
            $u = ModelUtilisateur::getUtilisateurByLogin($_POST['login']);
            if($u->nonce == null){
                require (File::build_path(array('view','Utilisateur','TESTLOGIN.php')));
            } else {
                require (File::build_path(array('view','Utilisateur','ErreurLoginEmail.php')));
            }
        } else {
            require (File::build_path(array('view','Utilisateur','ErreurUtilisateurLogin.php')));
        }
    }
    
    public static function validate(){
        
            $id = $_GET["id"];
            $nonce = $_GET["nonce"];
            
            $u = ModelUtilisateur::getUtilisateurById($id);
            if($u->nonce == $nonce){
                $sql = "UPDATE P_Utilisateur SET nonce = null WHERE id=:tag_id";;
                $req_prep = Model::$pdo->prepare($sql);
                $values = array(
                    "tag_id" => $u->getId(),
                );
                $req_prep->execute($values);
                
                require (File::build_path(array('view','Utilisateur','VerifNonce.php')));
            }
    }
}
?>

