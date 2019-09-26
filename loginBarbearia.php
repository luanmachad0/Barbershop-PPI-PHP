<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


</head>

<style>
    /*.bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }*/

    /*@media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }*/

    .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
}

.mb-4 {
    width: 100%;
    height: 50%;
    padding: 15px;
    margin: auto;
    border-style: none;
}

body {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: center;
    align-items: center;
    padding-top: 40px;
    padding-bottom: 40px;
    background-color: white;
}

   
  </style>
  <!-- Custom styles for this template -->
  <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">
  <form class="form-signin" action="loginBarbearia.php" method="post">
<img class="mb-4" src="logoLogin.jpg" alt="" width="400" height="400">
<h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
<label for="inputEmail" class="sr-only">Email address</label>
<input name="email"  type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
<label for="inputPassword" class="sr-only">Password</label>
<input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
<div class="checkbox mb-3">
  <label>
    <input type="checkbox" value="remember-me"> Remember me
  </label>
</div>
<button type="submit" class="btn btn-lg btn-primary btn-block" name="signin">Sign in</button>
<button type="submit" class="btn btn-lg btn-primary btn-block" name="signup">Sign up</button>
</form>
</body>
<?php
function db_connect($host,$user,$pass,$db) {

$mysqli = new mysqli($host, $user, $pass, $db);

$mysqli->set_charset("utf8");

if($mysqli->connect_error) 
  die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());


return $mysqli;
}

$mysqli = db_connect('localhost','root','','barbershop');

if(isset($_POST['signin'])){
  $login = $_POST['email'];
  $senha = $_POST['password'];
  $connect = mysqli_connect('localhost','root','', 'barbershop');

             
      $verifica = mysqli_query($connect, "SELECT * FROM user WHERE user = 
      '$login' AND senha = '$senha'") or die("erro ao selecionar");
        if (mysqli_num_rows($verifica)<=0){
          echo"<script language='javascript' type='text/javascript'>
          alert('Login e/ou senha incorretos');window.location
          .href='loginBarbearia.php';</script>";
          die();
        }else{
          setcookie("login",$login);
          header("Location:index.php");
        }
}

if(isset($_POST['signup'])){
  $email_banco = $_POST['email'];
  $password_banco = $_POST['password'];
  $link = mysqli_connect("localhost", "root", "", "barbershop");
  $result_cadastro = "INSERT INTO user (user, senha) VALUES ('$email_banco', '$password_banco')"; 
  $resultado_cadastro = mysqli_query($link, $result_cadastro);
  echo '<script>alert("Usuário cadastrado com sucesso!");</script>';
}

?>

</html>