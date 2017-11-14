<?php

Class ModelCommande {

  private $id;
  private $id_utilisateur;
  private $id_adresse;
      
  // un constructeur
   public function __construct($iu = NULL, $ia = NULL) {
   if (!is_null($i) && !is_null($iu) && !is_null($ia)) {
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
   
  
   public static function getAllCommandeById($id) {
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
  
  

public function save() {
    
    $rep = Model::$pdo->query("INSERT INTO commande (id, id_utilisateur, id_adresse ) VALUES ('$this->id', '$this->id_utilisateur', '$this->id_adresse' )");
}



}
?>
