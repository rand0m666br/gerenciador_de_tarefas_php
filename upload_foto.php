<?php
include("conexao.php");

if (isset($_FILES['arquivo'])) {
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
	$deu_certo = move_uploaded_file($arquivo['tmp_name'], $pasta.$newFilename.".".$extensao);
	if ($deu_certo) {
		echo "<p>Arquivo enviado com sucesso</p> <a target=\"_blank\" href=\"imagens/$newFilename.$extensao\">clique aqui</a></p>";
	}
	$query = "INSERT INTO imagem (nome, link, data) VALUES (?, ?, NOW())";
	$stmt = mysqli_prepare($conexao, $query);

	$linkArquivo = "imagens/$newFilename.$extensao";
	mysqli_stmt_bind_param($stmt, "ss", $newFilename, $linkArquivo);

	mysqli_stmt_execute($stmt);

	if (mysqli_stmt_affected_rows($stmt)>0) {
		echo "Dados inseridos com sucesso";
	}else {
		echo "Erro na inserção de dados no banco: " . mysqli_error($conexao);
	}
	mysqli_stmt_close($stmt);
}/*else {
	echo "Falha ao enviar o arquivo";
}*/
mysqli_close($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upload Imagem</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<form method="POST" enctype="multipart/form-data" action="">
		<p>
			<label>Selecione um arquivo</label>
			<input type="file" name="arquivo">
		</p>
		<button name="upload" type="submit" value="escolha">Enviar arquivo</button>
	</form>
</body>
</html>