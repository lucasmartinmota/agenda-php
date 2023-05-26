
    <title>Agenda Consultar</title>
    <link rel="stylesheet" href="../styles/consultar.css">
    <link rel="stylesheet" href="../styles/principal.css">

    <main class="form">
        <h2>
            Formulário de consulta de registros
        </h2>
        <form method="POST">
            <div class="consulta">
                <input placeholder="Digite um ID para consultar" type="number" name="id">
                <button class="cons" type="submit">Consultar</button>
            </div>
        </form>

        <?php
            session_start();      
          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                

                $_SESSION['id_consulta'] = $_POST['id'];

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
                                <td>Nome: $nome ______</td>
                                <td></td>
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
        <a href="./paginaInicial.php">Voltar para a página anterior!</a>
        </p>
    </main>

