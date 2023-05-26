<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $dsn = 'mysql:host=localhost;dbname=prova';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        echo 'Erro de conexão: ' . $e->getMessage();
        exit();
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
       
        $nome = $_POST['nome'];
        $telefone = $_POST['telefone'];

        $sql = 'UPDATE agenda SET nome = ?, telefone = ? WHERE id = ?';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $telefone, $id]);

        header('Location:  ../pages/AtualizarExcluir.php');
        exit();
    }

    $sql = 'SELECT nome, telefone FROM agenda WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $registro = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$registro) {
        echo 'Registro não encontrado.';
        exit();
    }

    ?>

    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../styles/index.css">
        <title>Editar Registro</title>
    </head>
    <body>
        <div class="containerAll">
        <h2>Editar Registro</h2>
        <form class="form" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="<?php echo $registro['nome']; ?>"><br>

            <label for="telefone">Telefone:</label>
            <input type="number" name="telefone" id="telefone" value="<?php echo $registro['telefone']; ?>"><br><br>

            <button type="submit">Salvar</button>
        </form></div>
    </body>
    </html>

    <?php
        } else {
            echo 'ID não fornecido.';
        }
    ?>
