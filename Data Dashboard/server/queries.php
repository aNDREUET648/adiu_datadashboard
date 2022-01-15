                <?php
                  include ("includes/conexion.php");

                  $sql1 = "              
                  SELECT *, (SELECT
                    ROUND(ROUND((units_sold * 100), 2) / SUM(quantity), 2)
                    FROM invoiceline) percentage
                  FROM (SELECT
                    g.name AS genre,
                    COUNT(*) AS units_sold
                    FROM track t
                    JOIN genre g
                    ON t.genreid = g.genreid
                    JOIN invoiceline il
                   ON il.trackid = t.trackid
                   GROUP BY 1
                  ORDER BY 2 DESC) sub
                  LIMIT 10;";

                  $result = mysqli_query($connection, $sql1);
                  $c = 0;
                  while($row = mysqli_fetch_assoc($result)){
                     $generos[$c] = $row["genre"];
                     $total[$c] = intval($row["units_sold"]); //, $row["percentage"];
                     $c++;
                  }
                  $genero = json_encode($generos);
                ?>
