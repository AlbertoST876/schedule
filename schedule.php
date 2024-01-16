<?php
    include "./vendor/autoload.php";
    session_start();

    if (isLogin()) {
        $user = $_SESSION["user"];

        $date = new DateTime();
        $date -> add(new DateInterval("P5Y"));
    } else {
        header("Location: ./login.php");
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
        <title>AlbertoST Informática - Agenda - Agenda</title>
    </head>

    <body>
        <header>
            <nav>
                <a href="./index.php"><img src="./assets/icon/icon.png"></a>

                <ul>
                    <li><a href="./index.php">Inicio</a></li>
                    <li><a id="actual" href="./schedule.php">Agenda</a></li>
                    <li><a href="./index.php?logout">Cerrar Sesión</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h1>Agenda</h1>

            <hr>

            <h2><?php echo ucfirst($user -> getName()); ?></h2>

            <details>
                <summary><h3 class="new">Nuevo</h3></summary>

                <form class="new" action="./schedule.php" method="post">
                    <select name="category" required>
                        <?php getCategoriesList(); ?>
                    </select>
                    
                    <label for="name">Titulo:</label>
                    <input type="text" name="name" maxlength="50" required>
                    
                    <label for="description">Descripción:</label>
                    <textarea name="description" maxlength="255" required></textarea>
                    
                    <label for="date">Fecha (se recordará el dia anterior):</label>
                    <input type="date" name="date" value="<?php echo date("Y-m-d"); ?>" min="<?php echo date("Y-m-d"); ?>" max="<?php echo $date -> format("Y-m-d"); ?>" required>

                    <input type="submit" name="add" value="Agregar">
                    <input type="reset" value="Borrar">
                </form>
            </details>

            <?php
                if (isset($_POST["add"])) addEvent();
                if (isset($_POST["delete"])) deleteEvent();

                getCategorisedUserEvents(); 
            ?>
        </main>
    </body>
</html>