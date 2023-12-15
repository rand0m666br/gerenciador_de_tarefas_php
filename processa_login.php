<?php
session_start();
include("conexao.php");

if ($_SERVER['REQUEST_METHOD']=="POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $query = "SELECT * FROM `usuarios` WHERE `email`='$email'";
    $res = mysqli_query($conexao, $query);

    if ($res->num_rows == 1) {
        $usuario = mysqli_fetch_assoc($res);
        if (password_verify($senha, $usuario["senha"])) {
            $_SESSION["id_usuario"]=$usuario["id_usuario"];
            $_SESSION["email_usuario"]=$usuario["email"];

            header("location: form.php");
        }else {
            echo "Login incorreco";
        }
    }
}
?>