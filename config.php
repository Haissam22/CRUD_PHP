<?php
require_once("db.php");

class Config
{
    private $id;
    private $nombre;
    private $direccion;
    private $logros;
    private $ingles;
    private $ser;
    private $reviw;
    private $skill;
    private $expertoTecg;

    protected $dbConexion;
    public function __construct($id=0,$nombre="",$direccion="",$logros="",$ingles="",$ser="",$reviw="",$skill="",$expertoTecg=""){
        $this->id=$id;
        $this->nombre=$nombre;
        $this->direccion=$direccion;
        $this->logros=$logros;
        $this->ingles=$ingles;
        $this->ser=$ser;
        $this->reviw=$reviw;
        $this->skill=$skill;
        $this->expertoTecg=$expertoTecg;

        $this->dbConexion=new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        
        
    }
    public function setID($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }
    public function setNombre($nombre){
        $this->nombre=$nombre;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setDireccion($direccion){
        $this->direccion=$direccion;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setLogros($logros){
        $this->logros=$logros;
    }
    public function getLogros($logros){
        return $this->logros;
    }
    public function setingles($ingles){
        $this->ingles=$ingles;
    }
    public function getingles(){
        return $this->ingles;
    }
    public function setser($ser){
        $this->ser=$ser;
    }
    public function getser(){
        return $this->ser;
    }
    public function setreviw($reviw){
        $this->reviw=$reviw;
    }
    public function getreviw(){
        return $this->reviw;
    }
    public function setskill($skill){
        $this->skill=$skill;
    }
    public function getskill(){
        return $this->skill;
    }
    public function setexpertoTeg($expertoTecg){
        $this->expertoTecg=$expertoTecg;
    }
    public function getexpertoTeg(){
        return $this->expertoTecg;
    }

    public function insertData(){
        try {
            $stm= $this->dbConexion-> prepare("INSERT INTO camper (id,nombre,direccion,logros,ingles,ser,review,skill,experteg) value (NULL,?,?,?,?,?,?,?,?);");
            $stm->execute([$this->nombre,$this->direccion,$this->logros,$this->ingles,$this->ser,$this->reviw,$this->skill,$this->expertoTecg]);
        } catch (Exception $th) {
             echo $th;
        }
    }

    public function selectAll()
    {
        try {
            $stm = $this->dbConexion->prepare("SELECT * FROM camper");
            $stm -> execute();
            return $stm->fetchAll();
        } catch (Exception $th) {
            return $th->getMessage();
        }

    }
    public function delete(){
        try {
            $stm=$this->dbConexion->prepare("DELETE FROM camper WHERE id = ?");
            $stm-> execute([$this->id]);
            return $stm->fetchAll();
            echo "<script>alert('borrado exitosamente');document.location='estudiantes.php'</script>";
        } catch (Exception $th) {
            echo $th->getMessage();
        }
    }
}


?>