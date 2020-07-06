<?php

$conexion = mysqli_connect("localhost", "root", "", "cerveceria") or
  die("Problemas con la conexión");

$registros = mysqli_query($conexion, "select id,id_usuario,promos,cervezas,date from pedidos") or
  die("Problemas en el select:" . mysqli_error($conexion));


while ($reg = mysqli_fetch_array($registros)) {
  echo "ID:" . $reg['id'] . "<br>";
  echo "Id del usuario:" . $reg['id_usuario'] . "<br>";
  echo "Promos:" . $reg['promos'] . "<br>";
  $promociones = explode (",",$reg['promos']);
  echo "Promociones <br>";
  echo $promociones[0] . "<br>";
  echo $promociones[1] . "<br>";

  $total = mysqli_query($conexion, "select costo from precios where nombre='p1' and nombre='p3'") or //NECESITO TRAER nombre=promociones[i]
    die("Problemas con la conexión");

  while ($row = $total->fetch_assoc()) {
        echo $row['costo']."<br>";
  }

  echo "Cerveza:" . $reg['cervezas'] . "<br>";
  echo "Fecha:" . $reg['date'] . "<br>";
  echo "<hr>";
}

mysqli_close($conexion);

?>