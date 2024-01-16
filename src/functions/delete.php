<?php

use Schedule\Classes\DB;

/**
 * Borra un evento de la base de datos
 *
 * @return void
 */
function deleteEvent(): void {
    $connect = new DB();
    $connect -> Remove("DELETE FROM events WHERE id = '" . $_POST["eventId"] . "'");
}

?>