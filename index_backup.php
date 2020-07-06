<!-- Reviso la DB por informacion del user-->
<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, nombre, email, password FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!-- Comienzo HTML-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Cerveceria - Home</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    
<!-- Logueo exitoso, HTML+PHP:-->
    <?php if(!empty($user)): ?>
      <br> Bienvenido, <?= $user['nombre']; ?>
      <br> Iniciaste sesion con exito.
      <br> ¿Como estas locura?



      <br>
      <a href="logout.php">
        Cerrar sesion
      </a>

<!-- Usuario no logueado-->
    <?php else: ?>
      <h1>Inicia sesión o registrate</h1>

      <a href="login.php">Iniciar Sesion</a> o
      <a href="signup.php">Registrate</a>
    <?php endif; ?>
  </body>
</html>
