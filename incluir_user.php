<?php


function imagem()
{
    if (isset($_FILES['arquivo'])) {
        include("conexao.php");
        $arquivo = $_FILES['arquivo'];
        if ($arquivo['error']) {
            die("Falha ao enviar o arquivo");
        }
        if ($arquivo['size'] > 60000000) {
            die("Arquivo muito grande. Max: 2MB");
        }
        $pasta = "imagens/";
        $filename = $arquivo['name'];
        $newFilename = uniqid(); // aqui o nome do arquivo é alterado
        $extensao = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg") {
            die("Formato inválido");
        }
        $deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta . $newFilename . "." . $extensao);
        if ($deu_certo) {
            echo "<p>Arquivo enviado com sucesso</p> <a target=\"_blank\" href=\"imagens/$newFilename.$extensao\">clique aqui</a></p>";
        }
        $query = "INSERT INTO imagem (nome, link, data) VALUES (?, ?, NOW())";
        $stmt = mysqli_prepare($conexao, $query);

        $linkArquivo = "imagens/$newFilename.$extensao";
        mysqli_stmt_bind_param($stmt, "ss", $newFilename, $linkArquivo);

        mysqli_stmt_execute($stmt);

        if (mysqli_stmt_affected_rows($stmt) > 0) {
            echo "Dados inseridos com sucesso";
        } else {
            echo "Erro na inserção de dados no banco: " . mysqli_error($conexao);
        }
        mysqli_stmt_close($stmt);
    }
}

if (isset($_POST["envia"])) {
    require("conexao.php");

    
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
    
    imagem();

    if (!$query) {
        echo "Erro";
    } else {
        header("location: form_usuario.php");
    }
}
