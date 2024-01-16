<?php
    include "./vendor/autoload.php";
    session_start();

    if (isLogin()) $user = $_SESSION["user"];

    if (isset($_GET["logout"])) {
        session_destroy();

        header("Location: ./index.php");
        exit();
    }
?>
<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Alberto Sánchez Torreblanca">
        <link rel="stylesheet" href="./assets/css/style.css">
        <link rel="icon" href="./assets/icon/icon.png">
        <title>AlbertoST Informática - Agenda - Inicio</title>
    </head>

    <body>
        <header>
            <nav>
                <a href="./index.php"><img src="./assets/icon/icon.png"></a>

                <ul>
                    <li><a id="actual" href="./index.php">Inicio</a></li>

                    <?php if (isLogin()) { ?>
                        <li><a href="./schedule.php">Agenda</a></li>
                        <li><a href="./index.php?logout">Cerrar Sesión</a></li>
                    <?php } else { ?>
                        <li><a href="./login.php">Iniciar Sesión</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>

        <main>
            <div class="container-fluid">
                <h1>Inicio</h1>

                <hr>

                <h2>Bienvenida</h2>

                <p>
                    Bienvenido a tu nueva Agenda personal almacenada en la nube, aquí podrás guardar tus notas, eventos, recordatorios, etc..., lo que necesites sin tener que instalar ninguna aplicación adicional
                    en cualquiera de tus dispositivos.
                </p>

                <p>
                    Esta agenda esta hecha con fines educativos y entre otros para su correcto uso.
                </p>
            </div>
        </main>
    </body>
</html>