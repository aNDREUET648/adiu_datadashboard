<?php 
$server = "localhost"; // El servidor que utilizaremos, en este caso será el localhost 
$user = "andreu"; // El usuario que tiene privilegios en la base de datos 
$pass = "andreu"; // La contraseña del usuario que utilizaremos 
$database = "chinook"; // El nombre de la base de datos 
 
/* 
Aquí abrimos la conexión en el servidor. 
Envío de 3 parametros (servidor, usuario y contraseña) a la función mysqli_connect.
*/
 
$connection = mysqli_connect($server, $user, $pass); 
 
/* 
Aquí preguntamos si la conexión no pudo realizarse, 
de ser así lanza un mensaje en la pantalla con el siguiente texto 
    "No pudo conectarse:" y le agrega el error ocurrido con "mysql_error()" 
*/

if (!$connection) { 
    die('<strong>No pudo conectarse:</strong> ' . mysqli_connect_error()); // es equivalente a exit()
}else{ 
            /*
            El echo de aquí abajo no se lo paso porque:
                - Cuando devuelvo al cliente los echo de mis queries, este también se suma
                - El cliente recibe éste echo más el JSON de mi query y al parsearlo (JSON.parse())
                    - Recibe 'Conectado  satisfactoriamente al servidor <br />' + '[["Rock","835","37.28"],...,["Reggae","30","1.34"]]'
                    - Esto no es un JSON correcto y devuelvería un error tipo
                        Uncaught SyntaxError: Unexpected token C in JSON at position 0 at JSON.parse (<anonymous>)
            */

            //  echo 'Conectado  satisfactoriamente al servidor <br />'; 
} 
 
//En esta linea seleccionaremos la BD con la que trabajaremos y le pasaremos como referencia la conexión al servidor. 
mysqli_select_db($connection, $database); 
?>