<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuários</title>
    <script src="https://kit.fontawesome.com/47e9777af5.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="tabela.css">
</head>

<body>
    <h1>Listagem de Usuários</h1>

    <?php
        @$mensagem = $_GET["mensagem"];
        echo $mensagem;
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Endereço</th>
                <th>Cidade</th>
                <th>Estado</th>
                <th>CEP</th>
                <th colspan="2">Ação</th>
            </tr>
        </thead>
        <?php
        session_start();
        require("conexao.php");
        // mysqli_select_db($conexao, $bd);
        $consulta = mysqli_query($conexao, "SELECT * FROM `usuarios`");
        while ($dados = mysqli_fetch_assoc($consulta)) {
        ?>
        <tbody>
            <tr>
                <td><?=$dados['id_usuario'];?></td>
                <td><?=$dados['nome'];?></td>
                <td><?=$dados['email'];?></td>
                <td><?=$dados['endereco'];?></td>
                <td><?=$dados['cidade'];?></td>
                <td><?=$dados['estado'];?></td>
                <td><?=$dados['cep'];?></td>
                <td><a href="editar_usuario.php?id=<?=$dados['id_usuario']?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                <td><a href="#"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</body>

</html>