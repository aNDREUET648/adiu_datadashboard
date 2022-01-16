<?php

//    Conexión al servidor al que accederemos y luego conecto a la BDD
include ("./conexion.php");


$sql="";                            // donde realizaré la query a la base de datos
$resultado = "";                    // esto es lo que se devolverá al cliente

/*
$_POST es una variable super global que se emplea para recoger datos que se reciben del cliente
después de enviarse en mi caso con el método jQuery.post(). 
Dependiendo del número de solicitud realizaré un query u otro.
*/
$seleccion = $_POST['solicitud'];

switch($seleccion){
  case 1:
/* Query 1 - Ventas por unidades por género y porcentaje de la venta. Limitado a los top 10 */
      $sql = "SELECT *, (SELECT ROUND(ROUND((units_sold * 100), 2) / SUM(quantity), 2)
                FROM invoiceline) percentage
              FROM (SELECT g.name AS genre, COUNT(*) AS units_sold
                FROM track t
                JOIN genre g ON t.genreid = g.genreid
                JOIN invoiceline il ON il.trackid = t.trackid
               GROUP BY 1 ORDER BY 2 DESC) sub LIMIT 10;";
      break;
  case 2:
/* Query 2 - Porcentaje de ventas en función del tipo de soporte */
      $sql = "SELECT *, (SELECT ROUND(ROUND((total_qty * 100), 2) / SUM(quantity), 2)
                FROM invoiceline) percentage
              FROM (SELECT m.name media_type, SUM(quantity) AS total_qty
                FROM mediatype m
                JOIN track t ON t.mediatypeid = m.mediatypeid
                JOIN invoiceline il ON il.trackid = t.trackid
              GROUP BY 1 ORDER BY 2 DESC) subquery;";
      break;
  case 3:
/* Query 3 - Unidades vendidas en función del tipo de soporte */
      $sql = "SELECT *, (SELECT ROUND(ROUND((total_qty * 100), 2) / SUM(quantity), 2)
                FROM invoiceline) percentage
              FROM (SELECT m.name media_type, SUM(quantity) AS total_qty
                FROM mediatype m
                JOIN track t ON t.mediatypeid = m.mediatypeid
                JOIN invoiceline il ON il.trackid = t.trackid
              GROUP BY 1 ORDER BY 2 DESC) subquery;";
      break;
  case 4:
/* Query 4 - Total de ventas realizadas en cada país */
      $sql = "SELECT i.BillingCountry, sum(total) as 'TotalSales'
                FROM invoice as i
              GROUP by BillingCountry ORDER by TotalSales DESC;";
      break;
}

$query = mysqli_query($connection, $sql);


// Obtener todas las filas de la consulta anterior en un array numérico
$resultado =  mysqli_fetch_all($query,MYSQLI_NUM);


/*
Un uso común del JSON es para el intercambio de información desde/hacia un servidor web
En la instrucción de más abajo codifico el '$resultado' de la query a formato JSON
y con el echo se envía al cliente
*/
echo json_encode($resultado);
?>
