<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Registro</title>
    <link rel="stylesheet" href="../styles/incluir.css">
</head>
<body>
    <section class="menu1">
        <form class="form" action="Resultado.php" method="GET">
            <h2>Página de inserção de registro</h2>
            <label for="nome">Nome</label>
            <input class="input" type="text" name="nome" required>
            <label for="telefone">Telefone</label>
            <input class="input" type="number" name="telefone" required>
            <input class="enviar" type="submit" value="Enviar">
        </form>
        <p>
            <a href="./paginaInicial.php">Voltar para a página anterior!</a>
        </p>
    </section>
    
</body>
</html>