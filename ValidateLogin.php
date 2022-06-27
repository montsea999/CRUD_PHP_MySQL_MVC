<?php

// archivo de validación del Login

session_start();
$_SESSION['login']= $_POST['login']; 
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
    background:url(img/index.JPG);
    background-repeat: no-repeat;
    background-position: top center;   
    width: 1000px;
    height: 600px;    
}
#nav{
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
<?php

// incluyo un try catch para gestionar los posibles errores de conexión
try{

// Instancio la clase PDO para la conexión
// establezco las características de la conexión llamando a la función setAttribute()
$connection = new PDO('mysql:host=localhost; bdname=proyecto_daw','root','');
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// preparo la instrucción sql con los marcadores :login y :password para buscar en la bbdd si el usuario existe o no existe en la tabla user
// preparo (mediante la instrucción a la que llama la conexión->prepare) una consulta preparada con marcadores también para evitar la inyección sql
$resultu = $connection->prepare("SELECT * FROM proyecto_daw.user WHERE user.userEmail= :login AND user.userPassword= :password");
$resulte = $connection->prepare("SELECT * FROM proyecto_daw.employee WHERE employee.employeeEmail= :login AND employee.employeePassword= :password");
$resultep = $connection->prepare("SELECT employeeProfile FROM proyecto_daw.employee WHERE employee.employeeEmail= :login AND employee.employeePassword= :password");

// creo una variable $login donde almaceno los datos rescatados del formulario. La función htmlentities convierte símbolos(comilla, guión,..) en html
// como argumento recibe lo que capturo de login con la función addslashes que escapa de caracteres extraños para evitar la inyección sql
$login = htmlentities(addslashes($_POST["login"]));
$password = htmlentities(addslashes($_POST["password"]));

// con la función bindValue() establezco que los marcadores serán lo que user|employee|Admin haya introducido
$resultu->bindValue(":login", $login);
$resultu->bindValue(":password", $password);

// $result llama a la función execute() para que ejecute la sentencia Sql
$resultu->execute();

// con la función rowCount() compruebo si la consulta no devuelve ninguna fila o devuelve alguna fila
$rowsResultu = $resultu->rowCount();

// creo un condicional donde, si hay cero filas devueltas, lo redirigiré a la página del formulario de registro 
if($rowsResultu !=0){

    // y si alguna fila devuelta, entra aquí, creo una sesión para el usuario logueado ya que está en la bbdd y sí que quiero darle acceso
    $user=$resultu->fetch();
    $_SESSION['userDni']=$user['userDni'];

    // almaceno en una variable de S_SESSION el login del usuario, como identificador de la sesión
    // y lo redirijo a la home de usuario
     header("location:UserAdvisoryHome.php");

} 
//como no está en usuario, entonces entrará aquí
else{
    $resulte->bindValue(":login", $login);
    $resulte->bindValue(":password", $password);
    $resulte->execute();
    $rowsResulte = $resulte->rowCount();

    //si está en empleados, tenemos q obtener el perfil y evaluarlo con un condicional switch
        if($rowsResulte !=0){ 

            //bindeamos login y password, ejecutamos la consulta 
            $resultep->bindValue(":login", $login);
            $resultep->bindValue(":password", $password);
            $resultep->execute();

            // obtención de la primera columna de la fila devuelta como resultado ---> https://www.php.net/manual/es/pdostatement.fetchcolumn.php
            $employeeProfile = $resultep->fetchColumn();
                 
            //si obtengo el perfil
            if(isset($employeeProfile)){ 

            //Evalúo $employeeProfile directamente con un condicional switch
                switch ($employeeProfile) {
                case 0:
                   //solo verá el UserAdvisoryHome hasta que el admin revise su ficha de empleado y le cambie el perfil a 1 para darle acceso a EmployeeAdvisoryHome
                    header("location:UserAdvisoryHome.php");
                    break;
                case 1:
                    //lo redirige a EmployeeAdvisoryHome
                    header("location:EmployeeAdvisoryHome.php");
                    break;
                case 2:
                    //Solamente el admin tendrá perfil 2. Será redirigido a AdminAdvisoryHome
                   header("location:AdminAdvisoryHome.php");
                    break;
                }
            } 

             }
             //si no es usuario ni tampoco empleado, entra aquí. No está registrado. Será redirigido al formulario de registro
             else{
                    header("location:RegistrationForm.php");
                   }
            }

}catch(Exception $e){
    // Si no puede conectar con la bbdd, matará el proceso y lanzará un mensaje de error 
    die("Error: " . $e->getMessage());
}
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