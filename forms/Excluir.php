<?php
$dsn = 'mysql:host=localhost;dbname=prova';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro de conexão: ' . $e->getMessage();
    exit();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = 'DELETE FROM agenda WHERE id = ?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    header('Location: ../pages/AtualizarExcluir.php');
    exit();

} else {
    echo 'ID de registro inválido.';
}
    print_r('Usuário excluido');
?>
