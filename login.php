<?php
    include "./vendor/autoload.php";
    session_start();
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
        <title>AlbertoST Informática - Agenda - Iniciar Sesión</title>
    </head>

    <body>
        <header>
            <nav>
                <a href="./index.php"><img src="./assets/icon/icon.png"></a>

                <ul>
                    <li><a href="./index.php">Inicio</a></li>

                    <?php if (isLogin()) { ?>
                        <li><a id="actual" href="./schedule.php">Agenda</a></li>
                        <li><a href="./index.php?logout">Cerrar Sesión</a></li>
                    <?php } else { ?>
                        <li><a id="actual" href="./login.php">Iniciar Sesión</a></li>
                    <?php } ?>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Iniciar Sesión</h1>

            <hr>

            <span>Para acceder a tu Agenda antes debes Iniciar Sesión</span>

            <aside>
                <form action="./login.php" method="post">
                    <label for="username">Nombre de Usuario:</label>
                    <input type="text" name="username" maxlength="25" required>
                
                    <label for="password">Contraseña:</label>
                    <input type="password" name="password" maxlength="255" required>
                
                    <input type="submit" name="login" value="Iniciar Sesión">
                    <div><a href="./register.php">Registrarse</a></div>
                </form>
            </aside>

            <?php
                if (isset($_POST["login"])) $_SESSION["user"] = login();

                if (isLogin()) {
                    header("Location: ./schedule.php");
                    exit();
                }
            ?>
        </main>
    </body>
</html>