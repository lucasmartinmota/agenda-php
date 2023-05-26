<?php

$dsn = 'mysql:host=localhost;dbname=prova';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
}

$editar = false;
$atualizado = false;
$excluido = false;

if (isset($_GET['editar'])) {
    $id = $_GET['editar'];
    $editar = true;


    $sql = 'SELECT nome, telefone FROM agenda WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$registro) {
        echo 'Registro não encontrado.';
        exit();
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];

}


if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    $id = $_POST['id'];

    $sql = 'DELETE FROM agenda WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $excluido = $stmt->execute([$id]);
}

if ($excluido) {
    echo 'Registro excluído com sucesso!';
} elseif (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    echo 'Erro ao excluir o registro.';
}


function exibirTabela()
{
    global $pdo;

   
    $sql = 'SELECT id, nome, telefone FROM agenda';
    $stmt = $pdo->query($sql);
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

 
    echo '<table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Telefone</th>
            </tr>';

    foreach ($registros as $registro) {
        $id = $registro['id'];
        $nome = $registro['nome'];
        $telefone = $registro['telefone'];

        echo "<tr>
                <td>$id</td>
                <td>$nome</td>
                <td>$telefone</td>
            </tr>";
    }

    echo '</table>';
}

?>


    <title>Atualizar e excluir</title>
    <link rel="stylesheet" href="../styles/atualizar.css">

<body>
    <div>
        <h2>Tabela de Registros</h2>

            <?php 
                    exibirTabela();
            ?>

        <p>
            <a href="./paginaInicialUser.php">Voltar para a página anterior!</a>
        </p>
    </div>
</body>

