<?php

// requiero la conexión a la BBDD mediante una llamada al archivo Connection.php 
require ("Connection.php");
// Creo la clase ReturnEmployees, que heredará de la clase Connection creada en el archivo Connection.php 

class ReturnEmployees extends Connection {
    
// No llamo al constructor de la clase padre Connection() porque la hereda implícitamente 
// va a ejecutar el constructor de Connection y va a conectar con la BBDD
// una vez he conectado con la BBDD voy a crear un segundo método que hará la consulta sql y me retornará un array de registros

//------POO usando la librería PDO-------------------------------------------------

    public function getEmployees() {

//creo la query
$sql = 'SELECT * FROM proyecto_daw.employee';

//creo una variable para que prepare la sentencia y la ejecute
$sentence = $this->connection_bd->prepare($sql);
$sentence->execute(array());

//creo una variable y le asigno el resultado del array asociativo que devolverá
$employees=$sentence->fetchAll(PDO::FETCH_ASSOC);

$sentence->closeCursor();

return $employees;

    }

}

?>