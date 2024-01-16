<?php

include "../vendor/autoload.php";
use Schedule\Classes\DB;

/**
 * Notifica a todos los usuarios por correo los eventos que quedan menos de un dia
 *
 * @param int $prevDays Dias de antelación para empezar a enviar correos
 * @return void
 */
function notifyByEmail(int $prevDays = 1): void {
    $connect = new DB();
    $result = $connect -> Select("SELECT users.email, events.name, events.description FROM events INNER JOIN users ON events.user = users.id WHERE DATEDIFF(date, '" . date("Y-m-d") . "') <= '$prevDays'");

    foreach ($result as $event) echo sendEmail($event["email"], $event["name"], $event["description"]);
}

/**
 * Enviar el correo final al usuario
 *
 * @param string $destination Email de destino
 * @param string $subject Nombre del evento
 * @param string $body Descripcion del evento
 * @return string
 */
function sendEmail(string $destination, string $subject, string $body): string {
    return mail($destination, $subject, $body) ? "Enviado\n" : "Error\n";
}

notifyByEmail($argv[1]);

?>