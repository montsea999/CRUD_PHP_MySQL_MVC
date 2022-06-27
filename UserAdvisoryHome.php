<?php
// Archivo de la vista de la home del usuario

// creo un filtro para que sólo pueda acceder quien se haya logueado correctamente
//si no se almacenó nada en la variable de sesión (porque no accedió desde el login) lo redirijo al login 
// (para evitar que se pueda acceder poniendo la url en la barra de navegación sin haber pasado por el formulario de Login)

session_start();     

if(!isset($_SESSION['login'])){ 
    header("location:Login.php");  
    }

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
#body img{
    max-width: 100%;
    object-fit: contain;
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
.orange-Btn:hover{
    transform: scale(1.2);
}

.margin{
    margin: 1%;
        }


</style>
<body>

    <!--header común a todas las vistas-->
    <header>       
        <div id="logo"> <h1 class="flowerRed" align="left">AdvisoryLLC</h1></div> 
        <br> <br><div id="title" class="flower" height="100px"><h3 >&nbsp; &nbsp;</h3></div>
    </header>

    <!--barra de navegación común a todas las vistas, que contiene 3 botones con los enlaces de navegación-->
    <nav >
        <ul id="nav">
            <?php
            echo "<a href= 'index.php'><li><p class='important'>Inicio</p></li></a>";            
            echo "<a href='Services.php'><li><p class='important'>Servicios</p></li>";
            echo "<a href='Login.php'><li><p class='important'>LogIn</p></li></a>";

    //imprimo el valor de la variable de sesión en el nav a partir del último botón, para que indique el e-mail del usuario que ha accedido
            echo "<br><h5 class='flower' style='color: white; font-size:1.5em; padding:3px;'>" . $_SESSION["login"] . "</h5>";
            ?>            
        </ul>        
    </nav>
    
    <div id="body">
<img>  
<div class="margin">

    <?php
    echo "<br><br><br><br><div align='center'><h1 class='flower' style='color: orangered;'>Bienvenid@ a nuestra home de usuario<br><br></h1><br>
    <h2 style='color: black;'>Nuestro equipo trabaja por y para tu tranquilidad<br><br>Solicita una cita telemática y un asesor resolverá tus dudas<br><br>Si prefieres venir al despacho, reserva una cita presencial<br><br>
    <h1 style='color: orangered;'>Solicita tu cita</h1>
    <br></h2>
    </div>";
      
    echo "<div align ='center'>";
    echo "<a href='FormAppointment.php'><input class='orange-Btn' type='button' class='pointer' value = 'PEDIR CITA'></a>";
    echo "</div>";
    
    echo "</div>";
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