<?php
session_start();
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

    <form action="incluir_user.php" method="POST" enctype="multipart/form-data"> 
        <fieldset>
            <legend>Nova Usuário</legend>

            <label>
                Nome: <input type="text" name="nome">
            </label>
            <label>
                Email: <input type="email" name="email">
            </label>
            <label>
                Senha: <input type="password" name="senha">
            </label>
            <label>
                Endereço: <input type="text" name="endereco">
            </label>
            <label>
                Cidade: <input type="text" name="cidade">
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
                CEP: <input type="text" name="cep">
            </label>
            <label>
                Foto: <input type="file" name="arquivo">
            </label>
            <input type="submit" value="Cadastrar" name="envia">
        </fieldset>
    </form> 
</body>

</html>