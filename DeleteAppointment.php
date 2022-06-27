<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/Style.css" type="text/css" media="">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Indie+Flower&family=Montserrat:wght@300;400&display=swap" rel="stylesheet">
<style>

#body{
    position:relative;
    margin:auto;
    background:url(img/wood.jpg);
    background-repeat: no-repeat;
    background-position: top center;  
    width: 1000px;
    height: 600px;    
}

</style>

</head>

<body>
  <!--header común a todas las vistas-->
  <header>
       
       <div id="logo"> <h1 class="flowerRed" align="left">AdvisoryLLC</h1></div> 
       <br> <br><div id="title" class="flower" height="100px"><h3 align="right">&nbsp; &nbsp;</h3></div>
   </header>
   <!--barra de navegación común a todas las vistas, que contiene 3 botones con los enlaces de navegación-->
   <nav >
       <ul id="nav">
           <?php
           echo "<a href= 'index.php'><li><p class='important'>Inicio</p></li></a>";            
           echo "<a href='Services.php'><li><p class='important'>Servicios</p></li>";
           echo "<a href='Login.php'><li><p class='important'>LogIn</p></li></a>";
           ?>            
       </ul>
       
   </nav>
   
   <div id="body">

<?php

include "Connection.php";
echo"<br>";
echo"<br>";

//creo la clase DeleteAppointment que hereda de la clase Connection y cuando el flujo llegue aquí, ejecutará implícitamente el constructor de Connector, conectando con la bbdd
class DeleteAppointment extends Connection{   
    // FUNCIONALIDAD DELETE del CRUD
    function delete($idToDelete){
        
        //query de tipo DELETE
        $sql = "DELETE FROM proyecto_daw.appointment WHERE appointmentId = ?";
        //preparo la query
        $result = $this->connection_bd->prepare($sql);
        $result->bindParam(1, $idToDelete);
        //ejecuto el resultado bindeado
        $result->execute();
        //cuento el número de resultados
        $deleted = $result->rowCount();

        if($deleted>0){
            echo "<br>";
            echo "<h1 class='flowerOrange'>Se ha(n) borrado " . $deleted . " registro(s)</h1>";
        } else {
            echo "<h1 class='flowerOrange'>No se ha borrado ningún registro</h1>";
        }
    }
}
    //creo la variable que recupera a través de la url el Dni del user que quiero eliminar
    $appointmentId=$_GET['appointmentId']; 

if (isset($appointmentId)) {

    $deleteAppointment = new DeleteAppointment(); //instancio la clase   
    $deleteAppointment->delete($appointmentId);
}

echo "<br>";
echo "<br>";
echo "<h1><a href='ShowAppointments.php'><input class='goBack-Btn' type='button' value = 'VOLVER'></a></h1>";

?>

</div>
    <!--bottom que tiene 4 columnas con redes sociales -->
    <div id="bottom">
        <ul >
            <li>
            <h1>&#169;2022AdvisoryLLC</h1>               
            </li>
            <li>
                <h1 class="flower">Entra y visítanos<br><br><a class= "important" href='Login.php'>LogIn</a></h1> 

            </li>
            <li>
            <h1 class="flower">Nuestros servicios<br><br><a class= "important" href='Services.php'>Servicios</a></h1>                 <img>
            </li>
             <!--columna 4a para redes sociales-->
             <li>
                <h1 class="flower">Síguenos en las redes!</h1> 
                <ol class="social"> 
                    <li><a href="#" class="fa fa-facebook"></a></li>
                    <li> <a href="#" class="fa fa-twitter"></a></li>
                    <li> <a href="#" class="fa fa-linkedin"></a></li>             
                </ol>

            </li>
        </ul>
    </div>    
</body>
</html>
