<html>

<head>
  <title>Problema</title>
</head>

<body>

  <?php
  $conexion = mysqli_connect("localhost", "root", "", "cerveceria") or
    die("Problemas con la conexión");

  $registros = mysqli_query($conexion, "select id,id_usuario,promos,cervezas,date from pedidos") or
    die("Problemas en el select:" . mysqli_error($conexion));


  while ($reg = mysqli_fetch_array($registros)) {
    echo "ID:" . $reg['id'] . "<br>";
    echo "Id del usuario:" . $reg['id_usuario'] . "<br>";
    echo "Promos:" . $reg['promos'] . "<br>";
    echo "Cerveza:" . $reg['cervezas'] . "<br>";
    echo "Fecha:" . $reg['date'] . "<br>";
    echo "<hr>";
  }

  mysqli_close($conexion);
  ?>

</body>

</html>