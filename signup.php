<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (nombre, email, password, ciudad, calle, numero, telefono) VALUES (:nombre, :email, :password, :ciudad, :calle, :numero, :telefono)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']); //nombre
    $stmt->bindParam(':email', $_POST['email']); //email
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); //encripto clave
    $stmt->bindParam(':password', $password); //clave
    $stmt->bindParam(':ciudad', $_POST['ciudad']); //ciudad
    $stmt->bindParam(':calle', $_POST['calle']); //calle
    $stmt->bindParam(':numero', $_POST['numero']); //numero
    $stmt->bindParam(':telefono', $_POST['telefono']); //email


    if ($stmt->execute()) {
      $message = 'Bienvenido! Ya podes iniciar sesion.';
    } else {
      $message = 'Error';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>


    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrate</h1>
    <span>o <a href="login.php">Inicia sesion</a></span>

    <form action="signup.php" method="POST">
      <!-- Info Usuario -->
      <input name="nombre" type="text" placeholder="Nombre">
      <input name="email" type="text" placeholder="Correo Electronico">
      <input name="password" type="password" placeholder="Clave">
      <input name="confirm_password" type="password" placeholder="Confirmar">
      Ciudad: 
      <select name="ciudad">
        <option value="1">La Plata</option>
        <option value="2">City Bell</option>
        <option value="3">Avellaneda</option>
      </select>
      <input name="calle" type="text" placeholder="Calle">
      <input name="numero" type="text" placeholder="Numero">
      <input name="telefono" type="text" placeholder="Celular">
      <!-- -->
      <input type="submit" value="Submit">

    </form>


  </body>
</html>
