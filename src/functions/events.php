<?php

use Schedule\Classes\DB;
use Schedule\Classes\Event;

/**
 * Obtiene los eventos de un usuario
 *
 * @return void
 */
function getUserEvents(): void {
    $connect = new DB();
    $result = $connect -> Select("SELECT id, category, name, description, date FROM events WHERE user = '" . $_SESSION["user"] -> getId() . "' ORDER BY date ASC");

    foreach ($result as $event) new Event($event["id"], $event["category"], $event["name"], $event["description"], $event["date"]);

    echo "<table><tr><th>Nombre</th><th>Descripción</th><th>Fecha</th><th>Acciones</th></tr>";

    Event::showAllEvents();

    echo "</table>";
}

/**
 * Obtiene los eventos categorizados de un usuario
 *
 * @return void
 */
function getCategorisedUserEvents(): void {
    $connect = new DB();
    $result = $connect -> Select("SELECT id, category, name, description, date FROM events WHERE user = '" . $_SESSION["user"] -> getId() . "' ORDER BY date ASC");

    foreach ($result as $event) new Event($event["id"], $event["category"], $event["name"], $event["description"], $event["date"]);

    $result = $connect -> Select("SELECT * FROM categories");

    foreach ($result as $category) {
        echo "<h3>" . $category["name"] . "s</h3><table><tr><th>Nombre</th><th>Descripción</th><th>Fecha</th><th>Acciones</th></tr>";
        
        Event::showCategoryEvents($category["id"]);

        echo "</table>";
    }
}

?>