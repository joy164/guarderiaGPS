<?php

namespace App;

class Infante{

    private static $db;
    private static $errores = [];
    private static $columnasDB =  ['ID_INFANTE', 'FOTO', 'NOM_INFANTE', 'APELLIDOS_INFANTE', 'ID_DISPOSITIVO', 'ALERGIA_MED', 'ALERGIA_ALIM', 'NOM_CONTACT_EM', 'TEL_CONTACT_EM'];

    //atributos de la clase
    public $ID_INFANTE;
    public $FOTO;
    public $NOM_INFANTE;
    public $APELLIDOS_INFANTE;
    public $ID_DISPOSITIVO;
    public $ALERGIA_MED;
    public $ALERGIA_ALIM;
    public $NOM_CONTACT_EM; 
    public $TEL_CONTACT_EM; 
    public $LAT;
    public $LON;


    public function __construct($args = []){
        $this->ID_INFANTE = $args['ID_INFANTE']??'';
        $this->NOM_INFANTE = $args['NOM_INFANTE']??'';
        $this->APELLIDOS_INFANTE = $args['APELLIDOS_INFANTE']??'';
        $this->ID_DISPOSITIVO = $args['ID_DISPOSITIVO']??'';
        $this->ALERGIA_MED = $args['ALERGIA_MED']??'';
        $this->ALERGIA_ALIM = $args['ALERGIA_ALIM']??'';        
        $this->NOM_CONTACT_EM = $args['NOM_CONTACT_EM']??'';
        $this->TEL_CONTACT_EM = $args['TEL_CONTACT_EM']??'';
    }
    public function create(){
        $atributos = $this->santizarDatos();
    
        //insertar en la base de datos
        $query = "INSERT INTO INFANTE( ";
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

        $query = "UPDATE INFANTE SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE ID_INFANTE = '".self::$db->escape_string($this->ID_INFANTE)."' ";
        $query .= " LIMIT 1";
        
        $resultado = self::$db->query($query);
        
        return $resultado;
    }
    public static function delete($id){

        $query = "DELETE FROM INFANTE WHERE ID_INFANTE = $id";
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
        $query = "SELECT * FROM INFANTE";
        $resultado = self::consultarSQL($query);
        
        return $resultado;
    }
    public static function find($id){
        $query = "SELECT * FROM INFANTE WHERE ID_INFANTE = $id";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }
    public function validar(){
        if(!$this->FOTO) self::$errores[]= "La imagen es obligatoria";
        if(!$this->NOM_INFANTE) self::$errores[]= "Debes agregar un nombre al infante";
        if(!$this->APELLIDOS_INFANTE) self::$errores[]= "Debes agregar los apellidos al infante";
        if(!$this->ID_DISPOSITIVO) self::$errores[]= "Debes ingresar el ID del dispositivo/brazalete";
        if(!$this->ALERGIA_MED) self::$errores[]= "Si el infante no tiene alergias medicas debe colocar \"Sin alergias\" concientemente";
        if(!$this->ALERGIA_ALIM) self::$errores[]= "Si el infante no tiene alergias de alimento debe colocar \"Sin alergias\" concientemente";
        if(!$this->NOM_CONTACT_EM) self::$errores[]= "El nombre del contacto de emergencia es obligatorio";
        if(!$this->TEL_CONTACT_EM) self::$errores[]= "El telefono del contacto de emergencia es obligatorio";
    
        return self::$errores;
    }  
    public function set_imagen($imagen){
        $this->FOTO = $imagen;
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
            if($columna != 'ID_INFANTE')
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
