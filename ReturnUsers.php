<?php

// requiero la conexión a la BBDD mediante una llamada al archivo Connection.php 
require ("Connection.php");
// Creo la clase ReturnUsers, que heredará de la clase Connection creada en el archivo Connection.php 
// y puedo usar las variables y métodos de ésta

class ReturnUsers extends Connection {    

// No llamo al constructor de la clase padre Connection() porque la hereda implícitamente 
// y va a ejecutar el constructor de Connection y va a conectar con la BBDD
// una vez he conectado con la BBDD voy a crear un segundo método que hará la consulta sql y me retornará un array de registros
//------POO usando la librería PDO-------------------------------------------------

    public function getUsers() {

//creo la query
$sql = 'SELECT * FROM proyecto_daw.user';

//creo una variable para que prepare la sentencia y la ejecute
$sentence = $this->connection_bd->prepare($sql);
$sentence->execute(array());

//creo una variable y le asigno el resultado del array asociativo que devolverá
$users=$sentence->fetchAll(PDO::FETCH_ASSOC);
$sentence->closeCursor();

return $users;

    }

}

?>
