<?php
require_once "Model.php";
class ModelVoiture {
	   
	private $id_commande;
	private $id_produit;
	private $quantite;

	public function getIdCommande() {
		return $this->id_commande;  
	}
        
        public function getIdProduit() {
		return $this->id_produit;  
	}
		     
	public function setIdProduit($produit) {
	    $this->id_produit = $produit;
	}
	
	public function getQuantite() {
		return $this->quantite;  
	}
		     
	public function setQuantite($quantite) {
	    $this->quantite = $quantite;
	}
	  
	public function __construct($ic = NULL, $ip = NULL, $q = NULL) {
            if (!is_null($ic) && !is_null($ip) && !is_null($q) ) {
                $this->id_commande = $l;
                $this->id_produit = $m;
                $this->quantite = $n;
            }
        } 
        
        public static function getAllUtilisateur(){
            $rep = Model::$pdo->query("SELECT * FROM P_Contenu_Commande");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelContenuCommande');
            $tab_voit = $rep->fetchAll();
            return $tab_voit;
        }
	
        
        public static function getUtilisateurById($idCommande) {
            $sql = "SELECT * from P_Contenu_Commande WHERE id=:nom_tag";
            // Préparation de la requête
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "nom_tag" => $idCommande,
                //nomdutag => valeur, ...
            );
            // On donne les valeurs et on exécute la requête	 
            $req_prep->execute($values);
            // On récupère les résultats comme précédemment
            $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelContenuCommande');
            $tab_util = $req_prep->fetchAll();
            // Attention, si il n'y a pas de résultats, on renvoie false
            if (empty($tab_util)) {
                return false;
            }
            return $tab_util[0];
        }
        
        public function save(){
            Model::$pdo->query("INSERT INTO P_Contenu_Commande (id_commande, id_produit, quantite ) VALUES (\"" . $this->id_commande . "\"" . "," . "\"" . $this->id_produit . "\"" . "," . "\"" . $this->quantite . "\")");
        }
}
?>
