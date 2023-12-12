<?php
require("conexao.php");

$id = $_GET["id"];
$nome = $_POST["nome"];
$email = $_POST["email"];
$endereco = $_POST["endereco"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$cep = $_POST["cep"];

$query = mysqli_query($conexao, "UPDATE `usuarios` SET `nome`='$nome',`email`='$email',`endereco`='$endereco',`cidade`='$cidade',`estado`='$estado',`cep`='$cep' WHERE `id_usuario`='$id'");

if ($query) {
    header("location: tabela_usuarios.php?mensagem=atualizado com sucesso");
}else {
    echo "Erro";
}
?>