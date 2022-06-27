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
    background:url(img/sign.JPG);
    background-repeat: no-repeat;
    background-position: top center;  
    width: 1000px;
    height: 600px;
  
}
table{
        width:40%;
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
        .alignCenter{
            text-align:center;
        }
        td{
            text-align:center;
            padding: 6px;         

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

        input {
        width: 80%;        
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
        } 

        input:invalid{
        background-color:red;
        }

        .widthMax {
        width:75%; 
        }
        .white{
            color:white;
        }
        .border{
    border-bottom: 1px solid red;
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
    <br><h3 class="white">Lo sentimos pero no puedes acceder porque no estás registrad@. Regístrate ahora!<br></h3><br>
    
<form action="Insert.php" method="post">
<table class="borderRadius">
<tr><td class="flower" colspan="2"><h2 class="flower">Formulario de Registro</h2>
<tr><td class="flower" class = "alignRight">DNI:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" minlength="9" maxlength="9" name="dni" placeholder="dni"></td></tr>
<tr><td class="flower" class = "alignRight">Nombre:</td><td class = "alignLeft"><input class="borderRadiusMin" type="text" name="name" placeholder="nombre"></td></tr>
<tr><td class="flower" class = "alignRight">Apellidos:</td><td class = "alignLeft"><input class="borderRadiusMin" class="borderRadiusMin" type="text" name="surname" placeholder="apellidos"></td></tr>
<tr><td class="flower" class = "alignRight">Dirección:</td><td class = "alignLeft"><input class="borderRadiusMin" class="borderRadiusMin" type="text" name="address" placeholder="dirección"></td></tr>
<tr><td class="flower" class = "alignRight">E-mail:</td><td class = "alignLeft"><input class="borderRadiusMin" class="borderRadiusMin" type="text" name="email" id="email" placeholder="e-mail"></td></tr>
<tr><td class="flower" class="alignRight">Password:</td><td class="alignLeft"><input class="borderRadiusMin" type="password" name="password" id="password" placeholder="password"></td></tr>

<tr><td class="flower"class="alignRight">Soy usuario | empleado</td><td class="alignLeft">

<!-- Select con dos opciones a elegir para que el registro se guarde, bien en la tabla user, bien en la tabla employee -->
<select class="borderRadiusMin" name="iam">
    <option value="usuario" selected>Usuario</option>
    <option value="empleado">Empleado</option></select></td></tr>

<!-- Input oculto en la vista formulario pero activo en caso de opción employee asignará valor "0" al atributo perfil en la inserción en la tabla employee -->
<tr><td class="alignLeft" type="hidden"><p class="hidded">Perfil:</p></td><td class="alignLeft"><input type="hidden" name="profile" value=0 ></td></tr>
 
<!--insertSubmit con onckick a función JS para validación de formato de e-mail-->
<tr><td colspan="2"><input class="borderRadius" type="submit" name="insertSubmit" value="REGISTRARME" onclick="validateEmail(form.email.value)"></td></tr>
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
    
    <!--match e-mail con Regex usando Javascript-->
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