<?php

require_once 'Model.php';

class ModelProduit extends Model{

    private $id;
    private $nom;
    private $prix;
    private $stock;
    private $lienimage;
    private $description;
    protected static $object='Produit';
    protected static $primary='id';
    

    // un getter      
    public function getId() {
        return $this->id;
    }

    // un setter 
    public function setId($id) {
        $this->id = $id;
    }

    public function getNom() {
        return $this->nom;
    }

    // un setter 
    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function getPrix() {
        return $this->prix;
    }

    // un setter 
    public function setPrix($prix) {
        $this->prix = $prix;
    }
    
     public function getStock() {
        return $this->stock;
    }

    // un setter 
    public function setStock($stock) {
        $this->stock = $stock;
    }
    
     public function getLienImage() {
        return $this->lienimage;
    }

    // un setter 
    public function setLienImage($lien_image) {
        $this->lienimage = $lienimage;
    }
    
     public function getDescription() {
        return $this->description;
    }

    // un setter 
    public function setDescription($description) {
        $this->description = $description;
    }

    // un constructeur
    public function __construct($n = NULL, $p = NULL, $s = NULL, $l = NULL, $d = NULL) {
        if (!is_null($n) && !is_null($p) && !is_null($s)  && !is_null($l)  && !is_null($d)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            // donc on retombe sur le constructeur à 3 arguments
            $this->nom = $n;
            $this->prix = $p;
            $this->stock = $s;
            $this->lienimage = $l;
            $this->description = $d;
        }
    }


 

    /*public function save(){
         
        $sql  = "Insert INTO P_Produit values (null, :nom , :prix, :stock, :lien_image, :description)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom" => $this->nom,
            "prix" => $this->prix,
            "stock" => $this->stock,
            "lien_image" => $this->lien_image,
            "description" => $this->description,
       );
        $req_prep->execute($values);
    }*/
    
  
    
     /*public static function update(){
        $sql  = "UPDATE P_Produit SET nom = :nom, prix = :prix, stock = :stock, lien_image = :lien_image, description = :description where id = :id ";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "id" => $this->id,
            "nom" => $this->nom,
            "prix" => $this->prix,
            "stock" => $this->stock,
            "lien_image" => $this->lien_image,
            "description" => $this->description,
       );
        $req_prep->execute($values);
    }*/
}
    

