<?php

// archivo para definir la conexión a la BBDD

//Los datos de configuración están definidos en las constantes del archivo Setting 

require("Setting.php");  

// creo la clase que me va a permitir conectarme a la BBDD

class Connection{

// creo una variable donde se almacene la conexión que tendrá el modificador de acceso protected
protected $connection_bd;

// constructor 
public function Connection() { 

// dentro programmo la conexión propiamente dicha donde el objeto this flecha variable creada es nueva extensión
// mysqli pasándole por parámetro host, nombre de la bbdd, usuario, contraseña (la dejo en blanco)

//------------------------POO USANDO PDO-------------------------------

try{
    $this->connection_bd = new PDO('mysql:host=localhost; bdname=proyecto_daw','root','');
    $this->connection_bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $this->connection_bd->exec("SET CHARACTER SET utf8");
    return $this->connection_bd;

} catch(Exception $e){
    echo "Hay un error de conexión en la línea: " . $e->getLine();
}
}
}

?>
