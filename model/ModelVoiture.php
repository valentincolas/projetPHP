<?php
require_once "Model.php";

class ModelVoiture {
	   
	private $marque;
	private $couleur;
	private $immatriculation;
	            
	public function getMarque() {
		return $this->marque;  
	}
		     
	public function setMarque($marque2) {
	    $this->marque = $marque2;
	}
	
	public function getCouleur() {
		return $this->couleur;  
	}
		     
	public function setCouleur($couleur2) {
	    $this->couleur = $couleur2;
	}
	
	public function getImmatriculation() {
		return $this->immatriculation;  
	}
		     
	public function setImmatriculation($immatriculation2) {
	    $this->immatriculation = $immatriculation2;
	}
	  
	public function __construct($m = NULL, $c = NULL, $i = NULL) {
            if (!is_null($m) && !is_null($c) && !is_null($i)) {
                // Si aucun de $m, $c et $i sont nuls,
                // c'est forcement qu'on les a fournis
                // donc on retombe sur le constructeur à 3 arguments
                $this->marque = $m;
                $this->couleur = $c;
                $this->immatriculation = $i;
            }
        } 
        
        public static function getAllVoiture(){
            $rep = Model::$pdo->query("SELECT * FROM Voiture");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
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
        
        public static function getVoitureByImmat($immat) {
            $sql = "SELECT * from Voiture WHERE immatriculation=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);

            $values = array(
                "nom_tag" => $immat,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);

            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelVoiture');
            $tab_voit = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_voit)) {
                return false;
            }
            return $tab_voit[0];
        }
        
        public function save(){
            Model::$pdo->query("INSERT INTO Voiture (immatriculation, marque, couleur) VALUES (\"" . $this->immatriculation . "\"" . "," . "\"" . $this->marque . "\"" . "," . "\"" . $this->couleur . "\")");
        }

}
?>