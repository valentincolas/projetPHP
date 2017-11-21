<?php

Class ModelCommande {

  private $id;
  private $id_utilisateur;
  private $id_adresse;
      
  // un constructeur
   public function __construct( $iu = NULL, $ia = NULL) {
   if (!is_null($iu) && !is_null($ia)) {
   $this->id_utilisateur = $iu;
   $this->id_adresse = $ia;
   }
  } 
           
  // une methode d'affichage.
  public function afficher() {
    echo $this->id,"<br>", $this->id_utilisateur,"<br>", $this->id_adresse;
  }
      
  public function getId() {
       return $this->id;  
  }
  
  public function setId($id) {
       $this->id = $id;     
  }
     
  public function getIdUtilisateur() {
       return $this->id_utilisateur;  
  } 
  
   public function setIdUtilisateur($utilisateur) {
       $this->id_utilisateur = $utilisateur;     
  }
        
  public function getIdAdresse() {
       return $this->id_adresse;  
  }
  
  public function setIdAdresse($adresse) {
       $this->id_adresse = $adresse;     
  }
  
   public static function getAllCommande(){
        $rep = Model::$pdo->query("SELECT * FROM P_Commande");
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelCommande');
        $tab_voit = $rep->fetchAll();
        return $tab_voit;
   }
   
  
   public static function getCommandeById($id) {
    $sql = "SELECT * from commande WHERE id=:nom_tag";
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
    $sql = "SELECT * from commande WHERE id_Utilisateur=:nom_tag";
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
                "tag_id_Utilisateur" => $this->id_utilisateur,
                "tag_id_Adresse" => $this->id_adresse,
            );
            
            $req_prep->execute($values);
    }



}
?>
