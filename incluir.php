<?php
if (isset($_POST["envia"])) {
    require_once("conexao.php");

    $nome = $_POST["nome"];
    $desc = $_POST["descricao"];
    $prazo = $_POST["prazo"];
    $prioridade = $_POST["prioridade"];
    if (isset($_POST["concluida"])) {
        $conclusao = "sim";
    }else {
        $conclusao = "não";
    }
    $usuario = $_POST["usuario"];

    $sql = "INSERT INTO `tarefas`(`tarefa`, `descricao`, `prazo`, `prioridade`, `conclusao`, `id_usuario`) VALUES ('$nome','$desc','$prazo','$prioridade','$conclusao','$usuario')";

    $query = mysqli_query($conexao, $sql);

    if (!$query) {
        echo "Erro";
    }else {
        header("location: form.php");
    }
}
?>