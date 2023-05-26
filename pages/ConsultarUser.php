<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Consultar</title>
    <link rel="stylesheet" href="../styles/consultar.css">
    <link rel="stylesheet" href="./styles/principal.css">
</head>
<body>

    <main class="form">
        <h2>
            Formulário de consulta de registros
        </h2>
        <form method="POST">
            <div class="consulta">
                <input placeholder="Digite um ID para consultar" type="text" name="id">
                <button class="cons" type="submit">Consultar</button>
            </div>
        </form>

        <?php
            session_start();      
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $id = $_POST['id'];

                $_SESSION['id_consulta'] = $id;

                if (isset($_SESSION['id_consulta'])) {
                    $id = $_SESSION['id_consulta'];
                $dsn = 'mysql:host=localhost;dbname=prova';
                $username = 'root';
                $password = '';


                try {
                    $pdo = new PDO($dsn, $username, $password);
                } catch (PDOException $e) {
                    echo 'Erro de conexão: ' . $e->getMessage();
                }

                $sql = 'SELECT nome, telefone FROM agenda WHERE id = ?';
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$id]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if ($result) {
                    $nome = $result['nome'];
                    $telefone = $result['telefone'];

                    echo "<table>
                            <tr>
                                <td>Nome: $nome ___________</td>
                                <td>Telefone: $telefone</td>
                            </tr>
                        </table>";
                } else {
                    echo "Nenhum registro encontrado.";
                }
      
                unset($_SESSION['id_consulta']);
            }
        }
        ?>
        <p>
        <a href="./paginaInicialUser.php">Voltar para a página anterior!</a>
        </p>
    </main>
</body>
</html>