<?php
$host   = "localhost";
$user   = "root";
$senha  = "";
$bd     = "gerenciador_de_tarefas";

$conexao = mysqli_connect($host, $user, $senha, $bd);

if(!$conexao) {
    echo "Erro";
}
?>