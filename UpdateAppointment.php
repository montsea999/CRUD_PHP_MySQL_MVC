<!DOCTYPE html>
<!--Archivo de modificación de cita con formulario que recibe por URL los datos del registro en el listado de citas-->
<!--y envía al mismo archivo por POST a la consulta UPDATE los datos introducidos en el formulario de modificación -->
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

#nav{
    border-bottom: 1px solid red;
}

table{
        width:40%;
        background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%);        
        opacity: 0.8;      
        margin: auto;        
    }
.alignLeft{
    text-align:left;
    }

td{
    text-align:center;
    padding: 15px;
    }

.borderRadius{
    border-radius: 10px;
   }

.borderRadiusMin{
    border-radius: 5px; 
   }

.hidded{
    visibility: hidden;
    }

    input, select {
        width: 50%;        
        }

        input[type=submit] {
        background-color: red;
        font-family: Source Sans Pro,sans-serif;
        font-size: 18px;
        font-weight:600;
        background-color:#04AA6D;
        color:#fff;
        border-radius:50px;
        padding:10px 40px;    
        } 
        
        input[type=submit]:focus {        
        opacity:0.9; 
        font-size:16px;
        } 
        
        .widthMax {
        width:75%; 
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

// llamo a Connection.php para conectar con la BBDD
include "Connection.php";
echo "<br>";
echo "<br>";

if(!isset($_POST["updateSubmit"])){
    //si no le dió todavía al submit creo variables que almacenen los valores recuperados en url 
        $appointmentId=$_GET['appointmentId'];
        //echo $appointmentId;
        
        $appointmentDateTime=$_GET['appointmentDateTime'];
       // echo $appointmentDateTime;       
        
        $appointmentType=$_GET['appointmentType'];
        //echo $appointmentType;
        
        $appointmentState=$_GET['appointmentState'];
       // echo $appointmentState;
        
        $serviceId_fk=$_GET['serviceId_fk'];
        //echo $serviceId_fk;
        
        $userDni_fk=$_GET['userDni_fk'];
        //echo $userDni_fk;
    }

class UpdateAppointment extends Connection{

    function update($idToUpdate){

    $sql="UPDATE proyecto_daw.appointment SET appointmentDateTime=?, appointmentType=?, appointmentState=?, serviceId_fk=?, userDni_fk=? WHERE appointmentId= ?";
    
    $result = $this->connection_bd->prepare($sql);
    
    $result->bindParam(1, $appointmentDateTime);
    $result->bindParam(2, $appointmentType);
    $result->bindParam(3, $appointmentState);
    $result->bindParam(4, $serviceId_fk);
    $result->bindParam(5, $userDni_fk);
    $result->bindParam(6, $appointmentId);

    //si ya clicó el submit, por POST envío al mismo archivo lo que haya modificado en los cuadros de texto 
  
    $appointmentDateTime=$_POST['appointmentDateTime'];
    $appointmentType=$_POST['appointmentType'];
    $appointmentState=$_POST['appointmentState'];
    $serviceId_fk=$_POST['serviceId_fk'];
    $userDni_fk=$_POST['userDni_fk'];
    $appointmentId=$_POST['appointmentId'];
    $result->execute();

    // y redirijo al archivo con la vista del listado de citas
    header("location:ShowAppointments.php");

    }
}

if($_POST){
    $updateAppointment = new UpdateAppointment();
    $updateAppointment->update($appointment);
}


?>


<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<table class="borderRadius">
<tr><td colspan="2" class="flower"><h2>Formulario de modificación de Cita</h2>
<tr><td class = "alignLeft">ID CITA:</td><td class = "alignLeft"><input class="borderRadiusMin" type="number" name="appointmentId" value="<?php echo $appointmentId ?>" ></td></tr>
<tr><td class = "alignLeft">FECHA:</td><td class = "alignLeft"><input class="borderRadiusMin" type="datetime-local" id="appointmentDateTime" name="appointmentDateTime" value="<?php echo $appointmentDateTime ?>" ></td></tr>
<tr><td class = "alignLeft">TIPO:</td><td class = "alignLeft"><input class="widthMax" class="borderRadiusMin" type="text" name="appointmentType" value="<?php echo $appointmentType ?>" ></td></tr>
<tr><td class = "alignLeft">ESTADO:</td><td class = "alignLeft"><input class="widthMax" class="borderRadiusMin" type="text" name="appointmentState" value="<?php echo $appointmentState ?>" ></td></tr>
<tr><td class = "alignLeft">ID_SERVICIO:</td><td class = "alignLeft"><input class="widthMax" class="borderRadiusMin" type="number" name="serviceId_fk" value="<?php echo $serviceId_fk ?>" ></td></tr>
<tr><td class="alignLeft">DNI_USUARIO:</td><td class="alignLeft"><input class="borderRadiusMin" type="text" name="userDni_fk" value="<?php echo $userDni_fk ?>" ></td></tr>
 
<!-- -->
<tr><td colspan="2"><input class="borderRadius, pointer" type="submit" name="updateSubmit" id="updateSubmit" value="MODIFICAR"></td></tr>
</table>
</form>

<?php

echo "<br>";


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
            <h1 class="flower">Nuestros servicios<br><br><a class= "important" href='Services.php'>Servicios</a></h1>                 
            <img>
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