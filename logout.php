<?php
session_start();
if(isset($_SESSION['login'])){
    // se você possui algum cookie relacionado com o login deve ser removido
    session_destroy();
    header("location: loginBarbearia.php");
    exit();
}
?>