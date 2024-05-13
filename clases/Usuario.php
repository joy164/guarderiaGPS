<?php

namespace App;

class Usuario{

    private static $db;
    private static $errores = [];
    private static $columnasDB =  ['ID_USUARIO', 'NOM_USER', 'CORREO_USER', 'CONTRASEÑA_USER'];

    //atributos de la clase
    public $ID_USUARIO;
    public $NOM_USER;
    public $CORREO_USER;
    public $CONTRASEÑA_USER;

    public function __construct($args = []){
        $this->ID_USUARIO = $args['ID_USUARIO']??'';
        $this->NOM_USER = $args['NOM_USER']??'';
        $this->CORREO_USER = $args['CORREO_USER']??'';
        $this->CONTRASEÑA_USER = $args['CONTRASEÑA_USER']??'';
    }
    public function create(){
        $atributos = $this->santizarDatos();
    
        //insertar en la base de datos
        $query = "INSERT INTO USUARIO( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES ('";
        $query .= join("', '", array_values($atributos));
        $query .= "' )";

        $resultado = self::$db->query($query);

        return $resultado;
    }
    public function update(){
        
        //sanitizar datos
        $atributos = $this->santizarDatos();

        $valores =[];

        foreach($atributos as $key => $value){
            $valores[] = "$key = '$value'";
        }

        $query = "UPDATE USUARIO  SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE ID_USUARIO = '".self::$db->escape_string($this->ID_USUARIO)."' ";
        $query .= " LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        return $resultado;
    }
    public static function delete($id){

        $query = "DELETE FROM USUARIO WHERE ID_USUARIO = $id";
        $resultado = self::$db->query($query);
        
        return $resultado;
    }
    public function sincronizarObjeto($args = []){
        
        foreach($args as $key => $value){
            
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
                
        }
            
    }
    public static function all(){
        $query = "SELECT * FROM USUARIO";
        $resultado = self::consultarSQL($query);
        
        return $resultado;
    }
    public static function find($id){
        $query = "SELECT * FROM USUARIO WHERE ID_USUARIO = $id";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }
    public function validar(){
        if(!$this->NOM_USER) self::$errores[]= "El nombre es obligatorio";
        if(!$this->CORREO_USER) self::$errores[]= "El correo es obligatorio";
        if(!$this->CONTRASEÑA_USER) self::$errores[]= "La contraseña es obligatoria";
    
        return self::$errores;
    }  
    public static function get_errores(){
        return self::$errores;
    }
    public static function setDB($database){
        self::$db = $database;
    }

    //METODOS PRIVADOS DE LA CLASE
    private function atributos(){
        $atributos = [];
        foreach(self::$columnasDB as $columna){
            if($columna != 'ID_USUARIO')
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }
    private function santizarDatos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value)
            $sanitizado[$key] = self::$db->escape_string($value);
        
        return $sanitizado;
    }
    private static function consultarSQL($query){
        $propiedades = [];
        //consultar la base de datos
        $resultado = self::$db->query($query);

        //iterar resultados
        while($propiedad = $resultado->fetch_assoc())
            $propiedades[] = self::crear_objeto($propiedad);
    
        $resultado->free();

        return $propiedades;
    }
    private static function crear_objeto($registro){
        $objeto = new self;

        foreach($registro as $key => $value)
            if(property_exists($objeto, $key))
                $objeto->$key = $value;   
    
        return $objeto;
    }

}
