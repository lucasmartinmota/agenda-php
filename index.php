<link rel="stylesheet" href="./styles/index.css">
<?php
$usuarios = array(
    array(
        "id" => 1,
        "nome" => "Administrador",
        "perfil" => "admin",
        "login" => "admin",
        "senha" => "admin"
    ),
    array(
        "id" => 2,
        "nome" => "Usuário Comum",
        "perfil" => "comum",
        "login" => "comum",
        "senha" => "comum"
    )
);

function verificarCredenciais($login, $senha) {
    global $usuarios;
    
    foreach ($usuarios as $usuario) {
        if ($usuario['login'] == $login && $usuario['senha'] == $senha) {
            return $usuario;
        }
    }
    
    return null;
}


if (isset($_POST['login']) && isset($_POST['senha'])) {
    $login = $_POST['login'];
    $senha = $_POST['senha'];
    
    $usuario = verificarCredenciais($login, $senha);
    
    if ($usuario) {
        session_start();
        $_SESSION['usuario'] = $usuario;
        
        if ($usuario['perfil'] == 'admin') {
            header('Location: ./pages/paginaInicial.php');
        } elseif ($usuario['perfil'] == 'comum') {
            header('Location: ./pages/paginaInicialUser.php');
        }
    } else {
        echo "Login ou senha incorretos.";
    }
}
?>

    <div class="containerAll">
    <h1>Autenticação do Sistema</h1>
    <form method="POST" action="">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" value="Entrar">
    </form></div>
