<?php

include '../conexion.php';

class Usuarios{
    
    //clase de datos del usuario
    
    private $id;
    private $curp;
    private $nombre;
    private $foto;
    private $direccion;
    private $telefono;
    private $correo;
    private $fechaIngreso;
    private $fechaAdmin;
    private $fechaValidacion;
    private $pass;
    private $validado;

    public function __construct($id, $curp, $nombre, $foto, $direccion, $telefono, $correo, $fechaIngreso, $fechaAdmin, $fechaValidacion, $pass, $validado){
        $this->id = $id;
        $this->curp = $curp;
        $this->nombre = $nombre;
        $this->foto = $foto;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->correo = $correo;
        $this->fechaIngreso = $fechaIngreso;
        $this->fechaAdmin = $fechaAdmin;
        $this->fechaValidacion = $fechaValidacion;
        $this->pass = $pass;
        $this->validado = $validado;

    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

    public function getCurp(){
        return $this->curp;
    }

    public function setCurp($curp){
        $this->curp = $curp;
        return $this;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
        return $this;
    }

    public function getFoto(){
        return $this->foto;
    }

    public function setFoto($foto){
        $this->foto = $foto;
        return $this;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
        return $this;
    }

    public function getTelefono(){
        return $this->telefono;
    }

    public function set($telefono){
        $this->telefono = $telefono;
        return $this;
    }

    public function getCorreo(){
        return $this->correo;
    }

    public function setCorreo($correo){
        $this->correo = $correo;
        return $this;
    }

    public function getFechaIngreso(){
        return $this->fechaIngreso;
    }

    public function setFechaIngreso($fechaIngreso){
        $this->fechaIngreso = $fechaIngreso;
        return $this;
    }

    public function getFechaAdmin(){
        return $this->fechaAdmin;
    }

    public function setFechaAdmin($fechaAdmin){
        $this->fechaAdmin = $fechaAdmin;
        return $this;
    }

    public function getFechaValidacion(){
        return $this->fechaValidacion;
    }

    public function setFechaValidacion($fechaValidacion){
        $this->fechaValidacion = $fechaValidacion;
        return $this;
    }

    public function getPass(){
        return $this->pass;
    }

    public function setPass($pass){
        $this->pass = $pass;
        return $this;
    }

    public function getValidado(){
        return $this->validado;
    }


    public function setValidado($validado){
        $this->validado = $validado;
        return $this;
    }


    public function __toString(){
        return $this->id."  ".$this->curp."  ".$this->nombre."  ".$this->correo."  ".$this->validado;
    }

    //funciones de manejo de base de datos
    public function mostrar($id){
        echo $id;
    }

    public function mostrarTodos(){
        

    }

    public function guardarUsuario($id, $curp, $nombre, $foto, $direccion, $telefono, $correo, $fechaIngreso, $fechaAdmin, $fechaValidacion, $pass, $validado){
        return "Hola";
    }

    public function actualizarUsuario($id){

    }

    public function suspenderUsuario($id){

    }

}

$prueba = new Usuarios(1,"Carlo","Vazc93","fotico","direccion","8255631","algo@gmail.com","12/12/2210", "12/12/2210", "12/12/2210","hola123", true);
if($_SERVER['REQUEST_METHOD']=='GET'){
    $stmt = $conn->prepare("SELECT * FROM vendedores");
    $stmt->execute();

        // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $result = $stmt->fetchAll();

    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK);
}
    

?>