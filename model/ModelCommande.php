<?php

Class ModelCommande {

  private $id;
  private $id_Utilisateur;
  private $id_Adresse;
      
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
  
   public static function getAllCommande(){
        $rep = Model::$pdo->query("SELECT * FROM P_Commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_voit = $rep->fetchAll();
        return $tab_voit;
   }
   
  
   public static function getCommandeById($id) {
    $sql = "SELECT * from P_Commande WHERE id=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nom_tag" => $id,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête	 
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
}
  
   public static function getCommandeByIdUtilisateur($id_Utilisateur2) {
    $sql = "SELECT * from P_Commande WHERE id_Utilisateur=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nom_tag" => $id_Utilisateur2,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête	 
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
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
    
    public function delete(){
            $sql = "DELETE FROM P_Commande WHERE id=:id";
            $req_prep = Model::$pdo->prepare($sql);
            $values = array(
                "id" => $this->id,
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
