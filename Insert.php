<?php

// Archivo de la funcionalidad INSERT (inserta registros a las tablas user, employee y appointment)
// desde el formulario de registro inserta a las tablas user | employee, y desde el formulario de reserva de citas a la tabla appointment

session_start();
?>

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
#nav{
    border-bottom: 1px solid red;
}
.orange-Btn{
    border-radius: 10px;
    font-size: 30px;
    font-weight:600;
    background-color:orangered;
    color:white;
    border-radius:50px;
    padding:10px 40px;    
}
.orangered{
    color:orangered;
}

 
.orange-Btn:hover{
    transform: scale(1.2);
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
echo"<br>";

class InsertUser extends Connection{

    function insertU(){

    $sql = "INSERT INTO proyecto_daw.user(userDni,userName,userSurname,
    userAddress,userEmail,userPassword) VALUES(?,?,?,?,?,?)";
    
    $result=$this->connection_bd->prepare($sql);

    $result->bindParam(1, $dni);
    $result->bindParam(2, $name);
    $result->bindParam(3, $surname);
    $result->bindParam(4, $address);
    $result->bindParam(5, $email);
    $result->bindParam(6, $password);

     $dni=$_POST['dni'];
     $name=$_POST['name'];
     $surname=$_POST['surname'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $password=$_POST['password'];

     $result->execute();
     header("location:Login.php");
    }
}

class InsertEmployee extends Connection{

    function insertE(){

        $sql = "INSERT INTO proyecto_daw.employee(employeeDni,employeeName,employeeSurname,
        employeeAddress,employeeEmail,employeePassword,employeeProfile) VALUES(?,?,?,?,?,?,?)";

        $result = $this->connection_bd->prepare($sql);

    $result->bindParam(1, $dni);
    $result->bindParam(2, $name);
    $result->bindParam(3, $surname);
    $result->bindParam(4, $address);
    $result->bindParam(5, $email);
    $result->bindParam(6, $password);
    $result->bindParam(7, $profile);

     $dni=$_POST['dni'];
     $name=$_POST['name'];
     $surname=$_POST['surname'];
     $address=$_POST['address'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $profile=$_POST['profile'];

     $result->execute();
     header("location:Login.php");
    }
}

if(isset($_POST['insertSubmit'])){
   
    if($_POST['iam']=="usuario"){

        $insertUser = new InsertUser(); //instancio la clase    
        $insertUser->insertU(); //y hago uso de la función insertU()

     }else{


$insertEmployee = new InsertEmployee(); //instancio la clase    
$insertEmployee->insertE(); //y hago uso de la función insertE()


    }
}

class InsertAppointment extends Connection{

    function insertA(){       
       
        $userDni=$_SESSION['userDni'];

        $sql = "INSERT INTO proyecto_daw.appointment(appointmentDateTime,appointmentType,
        appointmentState,serviceId_fk,userDni_fk) VALUES(?,?,?,?,?)";
        $result = $this->connection_bd->prepare($sql);

   $result->bindParam(1, $appointmentDateTime);
    $result->bindParam(2, $appointmentType);
    $result->bindParam(3, $appointmentState);
    $result->bindParam(4, $serviceId_fk);
    $result->bindParam(5, $userDni_fk);

    $appointmentDateTime=$_POST['appointmentDateTime'];
    $appointmentType=$_POST['appointmentType'];
    $appointmentState=1; // le doy el valor de 1 por defecto
    $serviceId_fk = $_POST['serviceDescription'];  //le doy a cada descripción de servicio como valor el id del servicio 
    $userDni_fk = $userDni;

     $result->execute();
     echo "<br>";
     echo "<br>";
     echo "<h1 class='flower, orangered'>Nueva cita añadida correctamente</h1>";
     echo"<br>";
     echo"<br>";
     echo"<h1 style='color: white;' class='flower'>Te llamaremos el día anterior para recordártelo. <br>Nuestros gestores estarán encantados de volverte a ver</h1>";
    }
}

if(isset($_SESSION['userDni'])){
    $insertAppointment = new InsertAppointment();
    $insertAppointment->insertA();      
}
else{
    echo "<h5>Debes identificarte para añadir citas</h5>";   
}

echo "<br>";
echo "<br>";
echo "<br>";
echo "<h3 class='margin'>Quieres reservar otra nueva cita?</h3>";
echo "<br>";
echo "<br>";
    echo "<div align='center'>";
    echo "<a href='FormAppointment.php'><input class='orange-Btn' type='button' value = 'PEDIR CITA'></a>";
    echo "</div>";

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