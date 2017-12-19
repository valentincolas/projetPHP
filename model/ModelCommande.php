<?php

Class ModelCommande extends Model {

  private $id;
  private $id_Utilisateur;
  private $id_Adresse;
  protected static $object='Commande';
  protected static $primary='id';



  // un constructeur
   public function __construct( $iu = NULL, $ia = NULL) {
   if (!is_null($iu) && !is_null($ia)) {
   $this->id_Utilisateur = $iu;
   $this->id_Adresse = $ia;
   }
  } 
           
  // une methode d'affichage.
  public function afficher() {
    echo $this->id,"<br>", $this->id_Utilisateur,"<br>", $this->id_Adresse;
  }
      
  public function getId() {
       return $this->id;  
  }
  
  public function setId($id) {
       $this->id = $id;     
  }
     
  public function getIdUtilisateur() {
       return $this->id_Utilisateur;  
  } 
  
   public function setIdUtilisateur($utilisateur) {
       $this->id_Utilisateur = $utilisateur;     
  }
        
  public function getIdAdresse() {
       return $this->id_Adresse;  
  }
  
  public function setIdAdresse($adresse) {
       $this->id_Adresse = $adresse;     
  }  
  
        
    public function save(){
            $sql = "INSERT INTO P_Commande (id, id_Utilisateur, id_Adresse) VALUES (null, :tag_id_Utilisateur, :tag_id_Adresse)";;
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "tag_id_Utilisateur" => $this->id_Utilisateur,
                "tag_id_Adresse" => $this->id_Adresse,
            );
            
            $req_prep->execute($values);
    }
    
    
    public function update(){
            $sql = "UPDATE P_Commande SET id_Utilisateur = :id_Utilisateur , id_Adresse = :id_Adresse WHERE id=:id";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                ":id_Utilisateur" => $this->id_Utilisateur,
                ":id_Adresse" => $this->id_Adresse,
                "id" => $this->id,
            );
            
            $req_prep->execute($values);
    }

}
?>
