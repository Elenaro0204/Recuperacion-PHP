<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 Practica Arrays</title>
</head>

<body>
    <h1>Ejercicio 1</h1>
    <p>Define tres arrays de 20 números enteros cada una, con nombres “numero”, “cuadrado” y “cubo”. Carga
        el array “numero” con valores aleatorios entre 0 y 100. En el array “cuadrado” se deben almacenar los
        cuadrados de los valores que hay en el array “numero”. En el array “cubo” se deben almacenar los cubos de los valores que hay en “numero”. A continuación, muestra el contenido de los tres arrays dispuesto en
        tres columnas.</p>

        <?php
          $numero=array();
          $cuadrado=array();
          $cubo=array();  

          // Generar valores aleatorios en el array "numero"
          for($i=0;$i<20;$i++){
            $numero[$i]=rand(0,100);
          }

          // Calcular cuadrados y cubos en los arrays "cuadrado" y "cubo"
          for($i=0;$i<20;$i++){
            $cuadrado[$i]=$numero[$i]*$numero[$i];
            $cubo[$i]=$numero[$i]*$numero[$i]*$numero[$i];
          }
        ?>

        <table border="1">
            <tr>
                <th style="padding: 5px;">Numero</th>
                <th style="padding: 5px;">Cuadrado</th>
                <th style="padding: 5px;">Cubo</th>
            </tr>
            <?php
              for($i=0;$i<20;$i++){
                echo "<tr>";
                  echo "<td>".$numero[$i]."</td>";
                  echo "<td>".$cuadrado[$i]."</td>";
                  echo "<td>".$cubo[$i]."</td>";
                echo "</tr>";
              }
           ?>
        </table>
</body>

</html>