<!DOCTYPE html>
<!-- Archivo de la vista del listado de empleados (funcionalidad READ del CRUD)-->

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

.table{
  padding: 8px;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 1em;
  border-collapse: collapse;
  width: 1000px;
  margin:auto;
  text-align:left;
  border-bottom: 1px solid #ddd;
  border-left: 5px;
}
.th, .thShort{  
background: linear-gradient(to bottom, #b5bdc8 0%,#828c95 36%,#28343b 100%); 
/*creado en https://www.colorzilla.com/gradient-editor/*/
color: white;
align:left;
}

.td, .tdShort, .tr, .th, .thShort{
  align:left;
}

.th, .td{
width:16%;
}

.thShort, .tdShort{
width:13%;
}

.tr:hover {
    background-color: #ddd;
}
.actualizar{  
        font-size: 1.1em;
        font-weight:200;
        background-color:#04AA6D;
        color:#fff;
        border-radius:15px;   
        cursor: pointer;  
        padding:0.2em;             
}
.borrar{  
        font-size: 1.1em;
        font-weight:200;
        background-color:red;
        color:#fff;
        border-radius:15px; 
        cursor: pointer;  
        padding:0.2em;      
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
// require al archivo ReturnEmployees y creo una instancia de la clase para q se ejecute el constructor de esta clase implícitamente

require ("ReturnEmployees.php");
$showEmployees = new ReturnEmployees();

// y creo una variable arrayEmployees para que almacene lo que devuelva el método getUsers, que era un return del array

$arrayEmployees = $showEmployees->getEmployees();

    echo "<table class='table'><div><h1 class='flowerRed'>Listado de empleados</h1></div><tr class='tr'><th class='thShort'>";
    echo "<b>DNI</b></th><th class='thShort'>";
    echo "<b>NOMBRE</b></th><th class='th'>";
    echo "<b>APELLIDOS</b></th><th class='th'>";
    echo "<b>DIRECCIÓN</b></th><th class='th'>";
    echo "<b>E-MAIL</b></th><th class='thShort'>";
    echo "<b>PASSWORD</b></th><th class='th'>";
    echo "<b>PERFIL</b></th><th class='btnShort, thShort'>";
    echo "&nbsp;</th><th class='btnShort, thShort'>";
    echo "&nbsp;</th></tr>";  

// recorro con un bucle foreach el array que quiero mostrar como (as) fila(row) 
// y dentro del bucle foreach, construyo una tabla con las filas que tengo almacenadas en el array asociativo

foreach($arrayEmployees as $row) {
  echo "<tr class='tr'><td class='tdShort'>";
    echo $row['employeeDni'] . "</td><td class='tdShort'>";
    echo $row['employeeName'] . "</td><td class='td'>";
    echo $row['employeeSurname'] . "</td><td class='td'>";
    echo $row['employeeAddress'] . "</td><td class='td'>";
    echo $row['employeeEmail'] . "</td><td class='tdShort'>";
    echo $row['employeePassword'] . "</td><td class='td'>";
    echo $row['employeeProfile'] . "</td><td class='btnShort, tdShort'>";
    echo "<a href='UpdateEmployee.php?employeeDni=". $row['employeeDni'] ."&employeeName=". $row['employeeName'] ."&employeeSurname=". $row['employeeSurname'] ."
    &employeeAddress=". $row['employeeAddress'] ."&employeeEmail=". $row['employeeEmail'] ."
    &employeePassword=". $row['employeePassword'] ." &employeeProfile=". $row['employeeProfile'] ."'><input type='button' class='btnShort, actualizar' name='updateSubmit' value='Actualizar'></td><td class='btnShort, 'tdShort'>";
    echo "<a href='DeleteEmployee.php?employeeDni=". $row['employeeDni'] ."'><input type='button' class='btnShort, borrar' name='submitB' value='Borrar'></a></td></br></tr>";    
  
    }
    echo "</tr></table>";
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

