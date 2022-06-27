<!DOCTYPE html>
<!--Archivo de modificación de usuario con formulario que recibe por URL los datos del registro en el listado de usuarios-->
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


table{
        width:50%;
        background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%);        
        opacity: 0.9;      
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

if(!isset($_POST["updateSubmit"])){
    //si no le dí todavía al submit creo variables que almacenen los valores recuperados en url 
        $userDni=$_GET['userDni'];
        //echo $userDni;
        
        $userName=$_GET['userName'];
        //echo $userName;
        
        $userSurname=$_GET['userSurname'];
        //echo $userSurname;
        
        $userAddress=$_GET['userAddress'];
        //echo $userAddress;
        
        $userEmail=$_GET['userEmail'];
        //echo $userEmail;
        
        $userPassword=$_GET['userPassword'];
        //echo $userPassword;
    }

class UpdateUser extends Connection{

    function update($dniToUpdate){

    $sql="UPDATE proyecto_daw.user SET userName=?, userSurname=?, userAddress=?, userEmail=?, userPassword=? WHERE userDni= ?";
    
    $result = $this->connection_bd->prepare($sql);
    
    $result->bindParam(1, $name);
    $result->bindParam(2, $surname);
    $result->bindParam(3, $address);
    $result->bindParam(4, $email);
    $result->bindParam(5, $password);
    $result->bindParam(6, $dni);

    //almaceno lo que el admin haya modificado en los cuadro de texto
  
    $name=$_POST['userName'];
    $surname=$_POST['userSurname'];
    $address=$_POST['userAddress'];
    $email=$_POST['userEmail'];
    $password=$_POST['userPassword'];
    $dni=$_POST['userDni'];

    $result->execute();

    // y redirijo al archivo con la vista del listado de usuarios
    header("location:ShowUsers.php");

    }
}

if($_POST){
    $updateUser = new UpdateUser();
    $updateUser->update($userDni);
}
echo "<br><br>";
?>

<form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
<table class="borderRadius">
<tr><td colspan="2" class="flower"><h2 class="flower">Modificar Usuario</h2>
<tr><td class = "alignLeft, flower">DNI:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="userDni" value="<?php echo $userDni ?>" ></td></tr>
<tr><td class = "alignLeft, flower">Nombre:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="userName" value="<?php echo $userName ?>" ></td></tr>
<tr><td class = "alignLeft, flower">Apellidos:</td><td class = "alignLeft"><input class="widthMax" class="borderRadiusMin" type="text" name="userSurname" value="<?php echo $userSurname ?>" ></td></tr>
<tr><td class = "alignLeft, flower">Dirección:</td><td class = "alignLeft"><input class="widthMax" class="borderRadiusMin" type="text" name="userAddress" value="<?php echo $userAddress ?>" ></td></tr>
<tr><td class = "alignLeft, flower">E-mail:</td><td class = "alignLeft"><input class="widthMax" class="borderRadiusMin" type="text" name="userEmail" value="<?php echo $userEmail ?>" ></td></tr>
<tr><td class="alignLeft, flower">Password:</td><td class="alignLeft"><input class="borderRadiusMin" type="password" name="userPassword" value="<?php echo $userPassword ?>" ></td></tr>
 

<tr><td colspan="2"><input class="borderRadius" type="submit" name="updateSubmit" id="updateSubmit" value="MODIFICAR"></td></tr>
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
</body>
</html>