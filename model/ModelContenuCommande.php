<?php
require_once "Model.php";
class ModelContenuCommande {
	   
	private $id_Commande;
	private $id_Produit;
	private $Quantite;

	public function getIdCommande() {
		return $this->id_Commande;  
	}
        
        public function getIdProduit() {
		return $this->id_Produit;  
	}
		     
	public function setIdProduit($produit) {
	    $this->id_Produit = $produit;
	}
	
	public function getQuantite() {
		return $this->Quantite;  
	}
		     
	public function setQuantite($quantite) {
	    $this->Quantite = $quantite;
	}
	  
	public function __construct($ic = NULL, $ip = NULL, $q = NULL) {
            if (!is_null($ic) && !is_null($ip) && !is_null($q) ) {
                $this->id_Commande = $ic;
                $this->id_Produit = $ip;
                $this->Quantite = $q;
            }
        } 
        
        public static function getAllContenuCommande(){
            $rep = Model::$pdo->query("SELECT * FROM P_Contenu_Commande");
            $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelContenuCommande');
            $tab_voit = $rep->fetchAll();
            return $tab_voit;
        }
	
        
        public static function getContenuCommandeById($idCommande) {
            $sql = "SELECT * from P_Contenu_Commande WHERE id_commande=:nom_tag";
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
            $sql = "INSERT INTO P_Contenu_Commande (id_Commande, id_Produit, Quantite) VALUES (:tag_id_Commande, :tag_id_Produit, :tag_Quantite)";;
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
		"tag_id_Commande" => $this->id_Commande,
                "tag_id_Produit" => $this->id_Produit,
		"tag_Quantite" => $this->Quantite,    
            );
            
            $req_prep->execute($values);
    }
    
    public function delete(){
            $sql = "DELETE FROM P_Contenu_Commande WHERE id_Commande=:idCommande";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "idCommande" => $this->id_Commande,
            );
            
            $req_prep->execute($values);
    }
    
    
    public function update(){
            $sql = "UPDATE P_Contenu_Commande SET id_Produit = :id_Produit, Quantite=:Quantite WHERE id_Commande=:id_Commande";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "id_Produit" => $this->id_Produit,
                "Quantite" => $this->Quantite,
            );
            
            $req_prep->execute($values);
    }
}
?>
