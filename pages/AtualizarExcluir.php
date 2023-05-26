<?php

$dsn = 'mysql:host=localhost;dbname=prova';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
}


function exibirTabela()
{
    global $pdo;


    $sql = 'SELECT id, nome, telefone FROM agenda';
    $stmt = $pdo->query($sql);
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo '<table>
            <tr>
                <th>ID:</th>
                <th>Nome:</th>
                <th>Telefone:</th>
                <th>Ações:</th>
            </tr>';

    foreach ($registros as $registro) {
        $id = $registro['id'];
        $nome = $registro['nome'];
        $telefone = $registro['telefone'];

        echo "<tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$telefone</td>
                <td>
                    <a href='../lib/editar.php?id=$id'>Editar</a> |
                    <a href='../lib/excluir.php?id=$id'>Excluir</a>
                </td>
            </tr>";
    }

    echo '</table>';
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar e excluir</title>
    <link rel="stylesheet" href="../styles/atualizar.css">
</head>
<body>
    <div>
        <?php
            exibirTabela();
            ?>

        <p>
            <a href="./paginaInicial.php">Voltar para a página anterior!</a>
        </p>
    </div>
</body>
</html>
