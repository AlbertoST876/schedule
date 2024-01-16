<?php

/**
 * Comprueba si un usuario ha iniciado sesión
 *
 * @return bool
 */
function isLogin(): bool {
    return isset($_SESSION["user"]) || !empty($_SESSION["user"]);
}

?>