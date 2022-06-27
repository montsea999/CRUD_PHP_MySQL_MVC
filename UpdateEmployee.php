<!DOCTYPE html>
<!--Archivo de modificación de empleado con formulario que recibe por URL los datos del registro en el listado de empleados-->
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
.goBack-Btn{
        border-radius: 10px;
        font-family: Source Sans Pro,sans-serif;
        font-size: 18px;
        font-weight:600;
        background-color:orange;
        color:#fff;
        border-radius:50px;
        padding:10px 40px;    
} 
table{
        width:40%;
        background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%);        
        border: 1px  grey;
        border: transparent;  
        opacity: 0.8;      
        margin: auto;        
    }
        .alignLeft{
            text-align:left;
        }

        td{
            text-align:center;
            padding: 12px;
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
        cursor:pointer;  
    
        } 
        
        input[type=submit]:focus {        
        opacity:0.9; 
        font-size:16px;
        cursor:pointer;  
        transform: scale(1.2);
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

echo "<br><br>";

if(!isset($_POST["updateSubmit"])){
//si no le dí todavía al submit creo variables que almacenen los valores recuperados en url 
$employeeDni=$_GET['employeeDni'];
//echo $employeeDni;

$employeeName=$_GET['employeeName'];
//echo $employeeName;

$employeeSurname=$_GET['employeeSurname'];
//echo $employeeSurname;

$employeeAddress=$_GET['employeeAddress'];
//echo $employeeAddress;

$employeeEmail=$_GET['employeeEmail'];
//echo $employeeEmail;

$employeePassword=$_GET['employeePassword'];
//echo $employeePassword;

$employeeProfile=$_GET['employeeProfile'];
//echo $employeeProfile;
}

class UpdateEmployee extends Connection{

    function update($dniToUpdate){

    $sql="UPDATE proyecto_daw.employee SET employeeName=?, employeeSurname=?, employeeAddress=?, employeeEmail=?, employeePassword=?, employeeProfile=? WHERE employeeDni= ?";
    
    $result = $this->connection_bd->prepare($sql);
    
    $result->bindParam(1, $name);
    $result->bindParam(2, $surname);
    $result->bindParam(3, $address);
    $result->bindParam(4, $email);
    $result->bindParam(5, $password);
    $result->bindParam(6, $profile);
    $result->bindParam(7, $dni);

    //almaceno lo que el admin haya modificado en los cuadros de texto
    $name=$_POST['employeeName'];
    $surname=$_POST['employeeSurname'];
    $address=$_POST['employeeAddress'];
    $email=$_POST['employeeEmail'];
    $password=$_POST['employeePassword'];
    $profile=$_POST['employeeProfile'];
    $dni=$_POST['employeeDni'];

    $result->execute();
    
    // y redirijo al archivo con la vista del listado de empleados
    header("location:ShowEmployees.php");

    }
}

if($_POST){

$updateEmployee = new UpdateEmployee();
$updateEmployee->update($employeeDni);

}


?>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<table class="borderRadius">
<tr><td colspan="2" ><h2 class="flower">Modificar datos de Empleado</h2>
<tr><td class = "alignLeft, flower">DNI:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="employeeDni" value="<?php echo $employeeDni ?>" ></td></tr>
<tr><td class = "alignLeft, flower">Nombre:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="employeeName" value="<?php echo $employeeName ?>" ></td></tr>
<tr><td class = "alignLeft, flower">Apellidos:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="employeeSurname" value="<?php echo $employeeSurname ?>" ></td></tr>
<tr><td class = "alignLeft, flower">Dirección:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="employeeAddress" value="<?php echo $employeeAddress ?>" ></td></tr>
<tr><td class = "alignLeft, flower">E-mail:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="employeeEmail" value="<?php echo $employeeEmail ?>" ></td></tr>
<tr><td class="alignLeft, flower">Password:</td><td class="alignLeft"><input class="borderRadiusMin" type="password" name="employeePassword" value="<?php echo $employeePassword ?>" ></td></tr>
<tr><td class="alignLeft, flower">Perfil:</td><td class="alignLeft"><input class="borderRadiusMin" Min="0" Max="2" type="number" name="employeeProfile" value="<?php echo $employeeProfile ?>"></td></tr>
 

<tr><td colspan="2"><input class="borderRadius" type="submit" name="updateSubmit" value="MODIFICAR" onclick="validateEmail(form.email.value)"></td></tr>
</table>
</form>

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
        <!--match e-mail con Regex usando Javascript para validar que el e-mail tenga el formato correcto -->
 <script>

function validateEmail(correo){

    var expReg=/^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
    var esValido=expReg.test(correo);

    if(!esValido==true){
        
        alert('uy, el e-mail introducido NO es válido');
    }
}

 </script>  
</body>
</html>