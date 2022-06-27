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
    background:url(img/Sign.JPG);
    background-repeat: no-repeat;/
    background-position: top center;  
    width: 1000px;
    height: 600px;
  
}
#nav{
    border-bottom: 1px solid red;
}
    table{
        width:50%;
        height: 300px;
        background: linear-gradient(to bottom, rgba(252,255,244,1) 0%,rgba(223,229,215,1) 40%,rgba(179,190,173,1) 100%);        
        border: 1px  grey;
        margin: auto;
        
    }
        .alignLeft{
            text-align:left;
        }
        .alignRight{
            text-align:right;
        }

        td{
            text-align:center;
            padding: 10px;

        }
        .borderRadius{
            border-radius: 10px;
        }

        .borderRadiusMin{
            border-radius: 5px;
        }
        input[type=submit] {
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
        <br/><br/>
      
        
        <form action="ValidateLogin.php" method="post" autocomplete="off">
<table class="borderRadius"><tr><td>
<h1 class="flower" color="orange"> LogIn </h1></td></tr>
    <tr><td class="alignRight"><h3>Login :</h3></td><td><input class="borderRadiusMin" type="text" placeholder="e-mail" name="login"></td></tr>
    <tr><td class="alignRight"><h3>Password :</h3></td><td><input class="borderRadiusMin" placeholder='password' type="password" name="password"></td></tr>
    <tr><td colspan="2"><br><input class="borderRadius"type="submit" name="sendLogin" value="LOGIN"></td>
           
    </tr><tr>
    <br><br></tr>
</table>
</form>

<br/><br/><br/><br/><br/></br></br>       
</div>
     <!--bottom con 4 columnas-->
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