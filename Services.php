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
    background:url(img/Services.JPG);
    background-repeat: no-repeat;
    background-position: top center;  
    width: 1000px;
    height: 600px;   
  
}
#nav{
    border-bottom: 1px solid red;
}

.services{
    align: left;
    left:5px;
}
.services li:not(:last-child)::after{
    content: ',';
    
}
.services li{
    list-style-type:'✔️';
    padding: 3px;
    margin-left:50px;
}
.orange{
    color: rgb(5,5,5);
}
h1{
    text-align:left;
    font-family: 'Indie Flower', cursive;
    margin-left: 15px;
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
      <img>  
      <div>
        <br/><br/><br/><br/><br/><br/><br/>
        <br/><br/><br/><br/><br/><br/>
        </div>
        <div>
        <h1 class="services" class="flower">Nuestros servicios:</h1>
            <ul class="services">
                <br>
                <li class="flower">&nbsp;Tramitación de Cancelaciones económicas / registrales de hipoteca</li>
                <br><li class="flower">&nbsp;Tramitación de cancelaciones de Embargo y condiciones resolutorias</li>
                <br><li class="flower">&nbsp;Tramitación de inscripción registral de escrituras de compraventas</li>
                <br><li class="flower">&nbsp;Tramitación de inscripción registral de escrituras de hipoteca</li>
                <br><li class="flower">&nbsp;Tramitación de liquidación de impuestos</li>
                
            </ul>
           </div>
      
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