<?php

use Schedule\Classes\DB;

/**
 * Devuelve las categorías listadas de los eventos
 *
 * @return void
 */
function getCategoriesList(): void {
    $connect = new DB();
    $result = $connect -> Select("SELECT * FROM categories");

    foreach ($result as $category) echo "<option value=" . $category["id"] . ">" . $category["name"] . "</option>";
}

/**
 * Añade a la base de datos un nuevo evento
 *
 * @return void
 */
function addEvent(): void {
    if (empty($_POST["category"]) || empty($_POST["name"]) || empty($_POST["description"]) || empty($_POST["date"])) {
        echo "<span>Faltan uno o más campos por rellenar</span>";
    } else {
        $connect = new DB();

        $category = $connect -> clearString($_POST["category"]);
        $name = $connect -> clearString($_POST["name"]);
        $description = $connect -> clearString($_POST["description"]);
        $date = $connect -> clearString($_POST["date"]);

        $connect -> Insert("INSERT INTO events (user, category, name, description, date) VALUES ('" . $_SESSION["user"] -> getId() . "', '$category', '$name', '$description', '$date')");
    }
}

?>