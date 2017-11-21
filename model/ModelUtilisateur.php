<?php
require_once "Model.php";

class ModelUtilisateur {
	   
	private $id;
	private $login;
	private $mdp;
        private $nom;
        private $prenom;
        private static $seed = "UjDmvjAyLr";
	          
        static public function getSeed() {
            return self::$seed;
        }
        
	public function getId() {
		return $this->id;  
	}
        
        public function getLogin() {
		return $this->login;  
	}
		     
	public function setLogin($log) {
	    $this->marque = $log;
	}
	
	public function getMdp() {
		return $this->mdp;  
	}
		     
	public function setMdp($mdp2) {
	    $this->couleur = $mdp2;
	}
	
	public function getNom() {
		return $this->nom;  
	}
		     
	public function setNom($nom2) {
	    $this->immatriculation = $nom2;
	}
        
        public function getPrenom() {
		return $this->prenom;  
	}
		     
	public function setPrenom($prenom2) {
	    $this->immatriculation = $prenom2;
	}
	  
	public function __construct($l = NULL, $m = NULL, $n = NULL, $p = NULL) {
            if (!is_null($l) && !is_null($m) && !is_null($n) && !is_null($p)) {
                $this->login = $l;
                $this->mdp = $m;
                $this->nom = $n;
                $this->prenom = $p;
            }
        } 
        
        public static function getAllUtilisateur(){
            $rep = Model::$pdo->query("SELECT * FROM P_Utilisateur");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $tab_voit = $rep->fetchAll();
            return $tab_voit;
        }
	
        /*
	public function afficher() {
		echo "<ul>";
		echo "<li> marque: " . $this->marque . "\n </li>";
		echo "<li> couleur: " . $this->couleur . "\n </li>";
		echo "<li> immatriculation: " . $this->immatriculation . "\n </li>";
                echo "</ul>";
		echo "<br>";
	}
        */
        
        public static function getUtilisateurById($id2) {
            $sql = "SELECT * from P_Utilisateur WHERE id=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $id2,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelUtilisateur');
            $tab_util = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_util)) {
                return false;
            }
            return $tab_util[0];
        }
        
        public function save(){
            $sql = "INSERT INTO P_Utilisateur (id, login, mdp, nom, prenom) VALUES (null, :tag_login, MD5(:tag_mdp), :tag_nom, :tag_prenom)";;
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "tag_login" => $this->login,
                "tag_mdp" => self::$seed . $this->mdp,
                "tag_nom" => $this->nom,
                "tag_prenom" => $this->prenom,
            );
            
            $req_prep->execute($values);
        }

}
?>