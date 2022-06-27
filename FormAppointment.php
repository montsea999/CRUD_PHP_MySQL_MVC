<?php
// Archivo de la vista del formulario de solicitud de cita para un servicio jurídico

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
#body img{
    max-width: 100%;
    object-fit: contain;
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
        cursor: pointer; 
        } 

.margin{
    margin: 1%;
}

.actualizar{  
        font-size: 1em;
        font-weight:200;
        background-color:#04AA6D;
        color:#fff;
        border-radius:15px;   
        cursor: pointer;               
}

.btnSubmit{
  border-radius: 25px;
  text-align: center;
  width:30%;
  background-color: green; 
  padding: 1%;
  color: white;  
  font-size: 1.5em;
  margin: 1%;
  cursor: pointer;
}

.btnSubmit:hover {
  transform: scale(0.8);
}

</style> 
</head>

<body>
   <!--header común a todas las vistas-->
   <header>
       
       <div id="logo"> <h1 class="flowerRed" align="left">AdvisoryLLC</h1></div> 
       <br> <br><div id="title" class="flower" height="100px"></div>
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

        <form action="Insert.php" method="post">

        <input type="hidden" name="appointmentId">

        <fieldset style="border-radius: 15px;">
    <legend><br><br><h3 class="flower">Selecciona fecha y hora para tu cita: </h3></legend>  
    <label for="appointmentDateTime"></label>
  <input class="margin" type="datetime-local" id="appointmentDateTime" name="appointmentDateTime">
 
  </fieldset><br>

  <fieldset style="border-radius: 15px;">
    <legend><h3 class="flower">Selecciona el tipo de cita que necesitas: </h3></legend>  
    <input class="margin" type="radio" name="appointmentType" id="TELEMATICA" value="TELEMÁTICA"><label for="radioa" class="flower">Telemática</label><br>
    <input class="margin" type="radio" name="appointmentType" id="PRESENCIAL" value="PRESENCIAL"><label for="radiob" class="flower">Presencial</label>
    <br>
  </fieldset> <br>

  <input type="hidden" name="appointmentState" value="1">

    <fieldset style="border-radius: 15px;">
    <legend ><h3 class="flower">Selecciona el servicio para el que necesitas nuestra ayuda: </h3></legend>    
     <input class="margin" type="radio" name="serviceDescription" id="3" value="3"><label for="CH" class="flower">Cancelación económica y/o registral de Hipoteca</label><br>
    <input class="margin" type="radio" name="serviceDescription" id="2" value="2"><label for="CE" class="flower">Cancelación de Embargo y condiciones resolutorias</label><br>
    <input class="margin" type="radio" name="serviceDescription" id="1" value="1"><label for="CV" class="flower">Inscripción registral de escrituras de compraventas</label><br>
    <input class="margin" type="radio" name="serviceDescription" id="4" value="4"><label for="PH" class="flower">Inscripción registral de escrituras de hipoteca</label><br>
    <input class="margin" type="radio" name="serviceDescription" id="5" value="5"><label for="MOD600" class="flower">Presentación y liquidación de todo tipo de impuestos</label><br>
    </fieldset><br>
    <input type="hidden" value="<?php $_SESSION['login']?>">

    <input class='btnSubmit' type="submit" name="appointmentSubmit">  
</form>

    </div>

      </div>
        <!--bottom que tiene 4 columnas, de izq a dcha, 2 con listado y otras 2-->
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