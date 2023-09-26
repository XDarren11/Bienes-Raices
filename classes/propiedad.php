<?php

namespace App;

class Propiedad {

    //base de datos
    protected static $db;
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedoresId'];

    //errores
    protected static $errores = [];

    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedoresId;

    //Definir la conexion a la base de datos
    public static function setDB($dataBase) {
        self::$db = $dataBase;
    }

    public function __construct($args = [])
    {
        $this -> id = $args['id'] ?? null;
        $this -> titulo = $args['titulo'] ?? '';
        $this -> precio = $args['precio'] ?? '';
        $this -> imagen = $args['imagen'] ?? '';
        $this -> descripcion = $args['descripcion'] ?? '';
        $this -> habitaciones = $args['habitaciones'] ?? '';
        $this -> wc = $args['wc'] ?? '';
        $this -> estacionamiento = $args['estacionamiento'] ?? '';
        $this -> creado = date('Y/m/d');
        $this -> vendedoresId = $args['vendedoresId'] ?? 1;
    }

    public function guardar() {
        if(!is_null($this->id)) {
            //Actualizando
            $this->actualizar();
        } else {
            //Crear
            $this->crear();
        }
    }

    public function crear() {

        //sanitizar los datos
        $atributos = $this-> sanitizarDatos();


        //Insertar en la base de datos
        $query = "INSERT INTO propiedades ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' "; 
        $query .= join("', '", array_values($atributos));
        $query .= " ');";

        $resultado = self::$db->query($query);

        if($resultado) {
            //redireccionar al usuario
            header("location: /admin?resultado=1");
        }
    }

    public function actualizar() {
        //sanitizar los datos
        $atributos = $this-> sanitizarDatos();

        $valores = [];
        foreach($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        $query = " UPDATE propiedades SET "; 
        $query .= join(', ', $valores );
        $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if($resultado) {
            //redireccionar al usuario
            header("location: /admin?resultado=2");
        }
    }

    //Eliminar un registro
    public function eliminar() {
        //Eliminar la propiedad
        $query = "DELETE FROM propiedades WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);

        if($resultado) {
            $this->borrarImagen();
            header('location: /admin?resultado=3?');
        }
    }

    //identificar y unir los datos de la BD
    public function atributos() {
        $atributos = [];
        foreach (self::$columnasDB as $columna){
            if($columna === 'id') continue; //este es para que ignore la columna de ID
            $atributos[$columna] = $this -> $columna;
        }

        return $atributos;
    }

    public function sanitizarDatos() {
        $atributos = $this -> atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value) {
            $sanitizado[$key] = self::$db -> escape_string($value);
        }

        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen) {

        //Elimina la imagen previa
        if(!is_null($this->id)) {
            $this->borrarImagen();
        }

        //Asignar al atributo de imagen el nombre de la imagen
        if($imagen) {
            $this -> imagen = $imagen;
        }
    }

    //Eliminar archivo
    public function borrarImagen() {
        $existeArchivo = file_exists(CARPETAS_IMAGENES . $this->imagen);
            if($existeArchivo) {
                unlink(CARPETAS_IMAGENES . $this->imagen);
            }
    }

    //Validacion
    public static function getErrores() {
        return self::$errores;
    }

    public function validar() {

        if(!$this -> titulo){
            self::$errores[] = 'Debes de añadir un titulo';
        }
        if(!$this -> precio){
            self::$errores[] = 'El precio es obligatorio';
        }
        if(strlen($this -> descripcion) < 50){
            self::$errores[] = 'La descripcion es obligatoria y debe de tener al menos 50 caracteres';
        }
        if(!$this -> habitaciones){
            self::$errores[] = 'El numero de habitaciones es obligatorio';
        }
        if(!$this -> wc){
            self::$errores[] = 'El numero de baños es obligatorio';
        }
        if(!$this -> estacionamiento){
            self::$errores[] = 'El numero de estacionamientos es obligatorio';
        }
        if(!$this -> vendedoresId){
            self::$errores[] = 'El vendedor es obligatorio';
        }

        if(!$this -> imagen) {
            self::$errores[] = 'La imagen es obligatoria';
        }
        
        return self::$errores;
    }

    //Lista todas las propiedades
    public static function all() {
        $query = "SELECT * FROM propiedades";

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Busca un reistro por su id
    public static function find($id) {
        $query = "SELECT * FROM propiedades WHERE id = ${id}";
        $resultado = self::consultarSQL($query);

        return array_shift($resultado); //retorna el primer elemento del array
    }

    public static function consultarSQL($query) {
        //Consultar la base de datos
        $resultado = self::$db->query($query);

        //Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = self::crearObjeto($registro);
        }

        //Liberar memoria
        $resultado -> free();

        //Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new self; //esto es como una nueva clase padre osea "una nueva propiedad"

        foreach($registro as $key => $value) {
            if(property_exists($objeto, $key)) {
                $objeto -> $key = $value;
            }
        }

        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar( $arg= []) {
        foreach($arg as $key => $value) {
            if(property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

}