<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /cerveceria');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /cerveceria");
    } else {
      $message = 'Sorry, those credentials do not match';
    }
  }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>Cerveceria - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin" action="login.php" method="POST">
  <!-- Logo   
  <img class="mb-4" src="../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
    -->
  <h1 class="h3 mb-3 font-weight-normal">Inicio de sesion</h1>

  <label for="inputEmail" class="sr-only">Correo Electronico</label>
  <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Correo Electronico" required autofocus>
  
  <label for="inputPassword" class="sr-only">Contraseña</label>
  <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required>
  <div class="checkbox mb-3">
  <!--  
  <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
    -->
  <button class="btn btn-lg btn-primary btn-block" type="submit" value="Submit">Iniciar Sesion</button>
  <p class="mt-5 mb-3 text-muted">&copy; Matias Caparros</p>
</form>
</body>
</html>
