<?php
require_once('../lib/File.php');
require_once('../lib/Security.php');
require_once (File::build_path(array('model','ModelUtilisateur.php'))); // chargement du modèle
if(!isset($_SESSION)){
    session_start();
}
class ControllerUtilisateur {
    
    public static function readAll(){
        $tab_u = ModelUtilisateur::selectAll(); //appel au modèle pour gerer la BD
        $controller = "Utilisateur";
        $view = 'ListeUtilisateur';
        $pagetitle = 'Liste Utilisateur';
        require (File::build_path(array('view', 'view.php')));
    }
    
    public static function read(){
        $u = ModelUtilisateur::select($_GET['id']);
        $controller = 'Utilisateur';
        if($u == false){
            $view = 'ErreurUtilisateurId';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view','view.php')));
        } else {
            $view = 'UtilisateurDetail';
            $pagetitle = 'Profil';
            require (File::build_path(array('view','view.php')));
        } 
    }
    
    public static function create(){
        $controller = 'Utilisateur';
        $view = 'CreateUtilisateur';
        $pagetitle = 'Inscription et Login';
        require (File::build_path(array('view','view.php')));
    }
    
    public static function created(){
        $i = 0;
        $tab_u = ModelUtilisateur::selectAll();
        foreach ($tab_u as $u){
            if($u->getLogin() == $_POST['login']){$i = 1;}
        }
        if($i == 1){
            $controller = 'Utilisateur';
            $view = 'ErreurUtilisateurSignup';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view','view.php')));
        } else {
            $nonce = generateRandomHex();
            $u = new ModelUtilisateur($_POST['login'], $_POST['mdp'], $_POST['nom'], $_POST['prenom'], $nonce, 0);
            $u->save();
            
            $to = $_POST['email'];
            $subject = "Verfication email";
            $message = "\n http://webinfo.iutmontp.univ-montp2.fr/~decadollem/ProjetPHP/controller/Routeur.php?table=ControllerUtilisateur&action=validate&id=" . htmlspecialchars(ModelUtilisateur::getUtilisateurByLogin($_POST['login'])->getId()) . "&nonce=" . $nonce;
            mail($to, $subject, $message);
            echo "Un mail de verification vous a été envoyé.";
            ControllerProduit::readAll();
            
        }
    }
    
    public static function login(){
        $controller = 'Utilisateur';
        $view = 'LoginUtilisateur';
        $pagetitle = 'Login';
        require (File::build_path(array('view','view.php')));
    }
    
    public static function logined(){
        $i = 0;
        $tab_u = ModelUtilisateur::selectAll();
        foreach ($tab_u as $u){
            if($u->getLogin() == $_POST['login2'] && $u->getMdp() == MD5(ModelUtilisateur::getSeed() . $_POST['mdp2'])){$i = 1;}
        }
        $controller = 'Utilisateur';
        if($i == 1){
            $u = ModelUtilisateur::getUtilisateurByLogin($_POST['login2']);
            if($u->nonce == null){    
                $_SESSION['login'] = $u->getLogin();
                $_SESSION['admin'] = $u->getAdmin();
                ControllerProduit::readAll();
            } else {
                $view = 'ErreurLoginEmail';
                $pagetitle = 'ERREUR';
                require (File::build_path(array('view','view.php')));
            }
        } else {
            $view = 'ErreurUtilisateurLogin';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view','view.php')));
        }
    }
    
    public static function validate(){
        
            $id = $_GET["id"];
            $nonce = $_GET["nonce"];
            
            $u = ModelUtilisateur::select($id);
            if($u->nonce == $nonce){
                $sql = "UPDATE P_Utilisateur SET nonce = null WHERE id=:tag_id";
                $req_prep = Model::$pdo->prepare($sql);
                $values = array(
                    "tag_id" => $u->getId(),
                );
                $req_prep->execute($values);
                
                $controller = 'Utilisateur';
                $view = 'VerifNonce';
                $pagetitle = 'Email valide';
                require (File::build_path(array('view','view.php')));
            }
    }
    
    public static function update(){
        $controller = 'Utilisateur';
        $view = 'UpdateUtilisateur';
        $pagetitle = 'update';
        require (File::build_path(array('view','view.php')));
    }
    
    public static function updated(){
        $u = ModelUtilisateur::getUtilisateurByLogin($_SESSION['login']);
        if(isset($_POST['login'])){
            $_SESSION['login'] = $_POST['login'];
            $u->setLogin($_POST['login']);
        }
        else if(isset($_POST['mdpOld']) && isset($_POST['mdpNew'])){
            if($u->getMdp() == MD5(ModelUtilisateur::getSeed() . $_POST['mdpOld'])){
                $u->setMdp($_POST['mdpOld']);
            }
        }
        else if(isset($_POST['nom'])){
            $u->setNom($_POST['nom']);
        }
        else if(isset($_POST['prenom'])){
            $u->setPrenom($_POST['prenom']);
        }
        $u->update();
        ControllerProduit::readAll();
    }
    
    public static function deconnect(){
        unset($_SESSION['login']);
        unset($_SESSION['admin']);
        ControllerProduit::readAll();
    }
    
    public static function delete(){
        $u = ModelUtilisateur::select($_GET['id']);
        if ($u == false) {
            $controller = "Utilisateur";
            $view = 'ErreurUtilisateurId';
            $pagetitle = 'ERREUR';
            require (File::build_path(array('view', 'view.php')));
        } else {
            ModelUtilisateur::delete($u->getId());
            ControllerUtilisateur::readAll();
        }
    }
    
    public static function admin(){
        $id = $_GET["id"];
        $u = ModelUtilisateur::select($id);
        $sql = "UPDATE P_Utilisateur SET admin = 1 WHERE id=:tag_id";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "tag_id" => $u->getId(),
        );
        $req_prep->execute($values);
                
        $controller = 'Utilisateur';
        $view = 'UtilisateurDetail';
        $pagetitle = 'Profil';
        require (File::build_path(array('view','view.php')));
        
    }
    
}
?>

