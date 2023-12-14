<?php
include("conexao.php");

if (isset($_GET["id_usuario"]) && is_numeric($_GET["id_usuario"])) {
    $id = intval($_GET["id_usuario"]);
    mysqli_query($conexao, "DELETE FROM `usuarios` WHERE `id_usuario`='$id'");

    header("location: tabela_usuarios.php");
}else {
    echo "id inválido ou inexistente";
}
?>