<?php
if (isset($_POST["envia"])) {
    require_once("conexao.php");

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $hash = password_hash($senha, PASSWORD_ARGON2I);
    $endereco = $_POST["endereco"];
    $cidade = $_POST["cidade"];
    $estado = $_POST["estado"];
    $cep = $_POST["cep"];

    $sql = "INSERT INTO `usuarios`(`nome`, `email`, `senha`, `endereco`, `cidade`, `estado`, `cep`) VALUES ('$nome','$email','$hash','$endereco','$cidade','$estado','$cep')";

    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        echo "Erro";
    }else {
        header("location: form_usuario.php");
    }
}
?>