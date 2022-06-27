<?php
// requiero la conexión a la BBDD mediante una llamada al archivo Connection.php 
require ("Connection.php");
// Creo la clase ReturnAppointment, que heredará de la clase Connection creada en el archivo Connection.php 
// y puedo usar las variables y métodos de ésta

class ReturnAppointment extends Connection {  
    
// No llamo al constructor de la clase padre Connection() porque la hereda implícitamente 
// y va a ejecutar el constructor de Connection y va a conectar con la BBDD
// una vez he conectado con la BBDD voy a crear un segundo método que hará la consulta sql y me retornará un array de registros

//------POO usando la librería PDO-------------------------------------------------

function getAppointments(){

    $sentence = $this->connection_bd->query(

        "SELECT appointmentId, DATE_FORMAT(appointmentDateTime, '%d/%m/%Y %H:%ih') AS appointmentDateTime, appointmentType,
        appointmentState,serviceId_fk ,userDni_fk FROM proyecto_daw.appointment"
          
    );

    return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

}
        
?>