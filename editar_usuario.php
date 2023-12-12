<?php
session_start();
require("conexao.php");
$id = $_GET["id"];
$sql = mysqli_query($conexao, "SELECT * FROM `usuarios` WHERE `id_usuario`='$id'");
$dados = mysqli_fetch_assoc($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Gerenciador de Tarefas</title>
</head>

<body>
    <h1>Gerenciador de Tarefas</h1>

    <form action="update_user.php?id=<?=$dados['id_usuario']?>" method="POST"> 
        <fieldset>
            <legend>Nova Usuário</legend>

            <label>
                Nome: <input type="text" name="nome"  value="<?=$dados['nome'];?>">
            </label>
            <label>
                Email: <input type="email" name="email" value="<?=$dados['email'];?>">
            </label>
            <label>
                Endereço: <input type="text" name="endereco" value="<?=$dados['endereco'];?>">
            </label>
            <label>
                Cidade: <input type="text" name="cidade" value="<?=$dados['cidade'];?>">
            </label>
            <label>
                Estado:
                <select name="estado" id="estado">
                    <option value="PR">Paraná</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="SP">São Paulo</option>
                </select>
            </label>
            <label>
                CEP: <input type="text" name="cep" value="<?=$dados['cep'];?>">
            </label>
            <input type="submit" value="Cadastrar" name="envia">
        </fieldset>
    </form> 
</body>

</html>