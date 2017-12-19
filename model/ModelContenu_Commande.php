<?php
require_once "Model.php";
class ModelContenu_Commande extends Model {
	   
	private $id_Commande;
	private $id_Produit;
	private $Quantite;
        protected static $object='Contenu_Commande';
        protected static $primary='id_Commande';

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
