<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Menu</title>
    <link rel="stylesheet" href="../styles/principal.css">
    <style>
        
        .color-1 { background-color: #FF2345; }
        .color-2 { background-color: #01FF18; }
        .color-3 { background-color: #f3f45f; }
    </style>
</head>
<body>
    <div class="menu">
        <h2>Menu principal</h2>
        <div class="options">
            <a href="./Consultar.php">Consultar</a>
            <a href="./Visualizar.php">Visualizar</a>
        </div>
    </div>

    <script>
        function getCurrentTime() {
            return new Date().getTime();
        }

        
        function checkLastAccess() {
            var lastAccess = localStorage.getItem('lastAccess'); 

            if (lastAccess && currentTime - lastAccess > 90000) {
                var randomColor = Math.floor(Math.random() * 3) + 1;
                var bodyElement = document.querySelector('body');

                bodyElement.classList.remove('color-1', 'color-2', 'color-3');

                bodyElement.classList.add('color-' + randomColor);
            }

            localStorage.setItem('lastAccess', currentTime);
        }

        window.onload = checkLastAccess;
    </script>
</body>
</html>
