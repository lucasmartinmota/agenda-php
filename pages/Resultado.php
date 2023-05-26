<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resultado</title>
  <link rel="stylesheet" href="../styles/resultado.css">
 
</head>
<body>  
    <header>
      <h1>Resultado</h1>
    </header>

    <main>
    <?php

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        
        $nome = $_GET['nome'];
        $telefone = $_GET['telefone'];

       
        $nome = ucwords($nome);

  
        $dsn = 'mysql:host=localhost;dbname=prova';
        $username = 'root';
        $password = '';

        try {
            $pdo = new PDO($dsn, $username, $password);
        } catch (PDOException $e) {
            echo 'Erro de conexão: ' . $e->getMessage();
        }


        $sql = 'INSERT INTO agenda (nome, telefone) VALUES (?, ?)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nome, $telefone]);

      
        $id = $pdo->lastInsertId();

        echo "<p class='sucesso'>Usuário $nome com $telefone inserido com sucesso! ID: $id</p>";
    }
?>

      <p>
        <a href="javascript:history.go(-1)">Voltar para a página anterior!</a>
      </p>
    </main>
</body>
</html>