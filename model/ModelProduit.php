<?php

require_once 'Model.php';

class ModelProduit {

    private $id;
    private $nom;
    private $prix;
    private $stock;
    private $lien_image;
    private $description;
    

    // un getter      
    public function getId() {
        return $this->id;
    }

    // un setter 
    public function setID($id) {
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
        return $this->lien_image;
    }

    // un setter 
    public function setLienImage($lien_image) {
        $this->lien_image = $lien_image;
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
            $this->lien_image = $l;
            $this->description = $d;
        }
    }


    static public function getAllProduit() {
        $rep = Model::$pdo->query('SELECT * FROM P_Produit');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
        $tab_voit = $rep->fetchAll();
        return $tab_voit;
    }
    
    static public function getProduitById($id) {
    $sql = "SELECT * from P_Produit WHERE id=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);

    $values = array(
        "nom_tag" => $id,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête	 
    $req_prep->execute($values);

    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelProduit');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
}

    public function save(){
         
        $sql  = "Insert INTO P_Addresse values (null, nom , prix, stock, lien_image, description)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "nom" => $this->nom,
            "prix" => $this->prix,
            "stock" => $this->stock,
            "lien_image" => $this->lien_image,
            "description" => $this->description,
       );
        $req_prep->execute($values);

    }
}
    

