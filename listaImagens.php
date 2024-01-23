<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Imagens</title>
    <link rel="stylesheet" href="tabela.css">
</head>
<body>
    <h1> listando imagens </h1>
    <table border="1">
        <thead>
            <th>Imagens</th>
            <th>Link</th>
            <th>Data</th>
        </thead>
        <?php
        include("conexao.php");
        $dados=mysqli_query($conexao,"SELECT * FROM imagem");
        while($item = mysqli_fetch_array($dados)){
        ?>
        <tr align="center">
            <td><img src="<?=$item['link']?>" style="max-width: 50px;max-height:50px;"></td>
            <td><a target="_blank" href="<?=$item['link']?>"><?=$item['link']?></a></td>
            <td><?=date('d/m/Y',strtotime($item['data']))?></td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>