<?php
  $conexion = mysqli_connect("localhost", "root", "", "users") or
    die("Problemas con la conexión");

  $registros = mysqli_query($conexion, "select id,nombre,email
                        from users where email='$_REQUEST[mail]'") or
    die("Problemas en el select:" . mysqli_error($conexion));

  if ($reg = mysqli_fetch_array($registros)) {
    echo "Nombre:" . $reg['nombre'] . "<br>";
    echo "Curso:";
    switch ($reg['codigocurso']) {
      case 1:
        echo "PHP";
        break;
      case 2:
        echo "ASP";
        break;
      case 3:
        echo "JSP";
        break;
    }
  } else {
    echo "No existe un alumno con ese mail.";
  }
  mysqli_close($conexion);
?>


<html>

<head>
  <title>Problema</title>
</head>

<body>
  <form action="pagina2.php" method="post">
    Ingrese el mail del alumno a consultar:
    <input type="text" name="mail">
    <br>
    <input type="submit" value="buscar">
  </form>
</body>

</html>