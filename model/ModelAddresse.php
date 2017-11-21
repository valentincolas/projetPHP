<?php
require_once 'Model.php';
class ModelAddresse {

    private $id;
    private $rue;
    private $ville;
    private $code_postal;
    private $pays;
    
    // un getter      
    public function getId() {
        return $this->id;
    }
    // un setter 
    public function setID($id) {
        $this->id = $id;
    }
    public function getRue() {
        return $this->rue;
    }
    // un setter 
    public function setRue($rue) {
        $this->rue = $rue;
    }
    public function getVille() {
        return $this->ville;
    }
    // un setter 
    public function setVille($ville) {
        $this->ville = $ville;
    }
    
     public function getCodePostal() {
        return $this->code_postal;
    }
    // un setter 
    public function setCodePostal($code_postal) {
        $this->code_postal = $code_postal;
    }
    
     public function getPays() {
        return $this->pays;
    }
    // un setter 
    public function setPays($pays) {
        $this->pays = $pays;
    }
    
    // un constructeur
    public function __construct($r = NULL, $v = NULL, $cp = NULL, $p = NULL) {
        if (!is_null($r) && !is_null($v) && !is_null($cp) && !is_null($p)) {
            // Si aucun de $m, $c et $i sont nuls,
            // c'est forcement qu'on les a fournis
            $this->rue = $r;
            $this->ville = $v;
            $this->code_postal = $cp;
            $this->pays = $p;
        }
    }
 

    static public function getAllAddresse() {
        $rep = Model::$pdo->query('SELECT * FROM P_Addresse');
        $rep->setFetchMode(PDO::FETCH_CLASS, 'ModelAddresse');
        $tab_voit = $rep->fetchAll();
        return $tab_voit;
    }
    
    static public function getAddresseById($id) {
    $sql = "SELECT * from P_Addresse WHERE id=:nom_tag";
    // Préparation de la requête
    $req_prep = Model::$pdo->prepare($sql);
    $values = array(
        "nom_tag" => $id,
        //nomdutag => valeur, ...
    );
    // On donne les valeurs et on exécute la requête	 
    $req_prep->execute($values);
    // On récupère les résultats comme précédemment
    $req_prep->setFetchMode(PDO::FETCH_CLASS, 'ModelAddresse');
    $tab_voit = $req_prep->fetchAll();
    // Attention, si il n'y a pas de résultats, on renvoie false
    if (empty($tab_voit))
        return false;
    return $tab_voit[0];
    }
    public function save(){
        $sql  = "Insert INTO P_Addresse values (null, :rue , :ville, :code_postal, :pays)";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "rue" => $this->rue,
            "ville" => $this->ville,
            "code_postal" => $this->code_postal,
            "pays" => $this->pays,
       );
        $req_prep->execute($values);
    }
   
    
}
