<?php
include("conexao.php");

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    mysqli_query($conexao, "DELETE FROM `usuarios` WHERE `id_usuario`='$id'");

    header("location: tabela_usuarios.php");
}else {
    echo "id inválido ou inexistente";
}
?>