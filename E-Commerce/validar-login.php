<?php
session_start();
$acesso = "";
if (isset($_POST["email"])) {
    include('conectar.php');
    $email = $_POST["email"];
    $senha  = $_POST["senha"];
    $retorno = conectar("select * from admin where email = '$email' and senha = '$senha';");
    if($linha = $retorno->fetch_assc()){
        $_SESSION['ACESSO-RESTRITO'] = True;
        echo "<script>window.location.replace('admin.php');</script>";
    }else{
        $acesso = "acesso negado,";
    }
    }
?>