<?php
require_once 'Model.php';
class ModelAddresse extends Model {

    private $id;
    private $rue;
    private $ville;
    private $code_postal;
    private $pays;    
    protected static $object='Addresse';
    protected static $primary='id';
    
    // un getter      
    public function getId() {
        return $this->id;
    }
    // un setter 
    public function setId($id) {
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
    
   
    /* public function update(){
        $sql  = "UPDATE P_Addresse SET rue = :rue, ville = :ville, code_postal = :code_postal, pays = :pays WHERE id = :id ";
        $req_prep = Model::$pdo->prepare($sql);
        $values = array(
            "id" => $this->id,
            "rue" => $this->rue,
            "ville" => $this->ville,
            "code_postal" => $this->code_postal,
            "pays" => $this->pays,
       );
        $req_prep->execute($values);
    }*/
}
