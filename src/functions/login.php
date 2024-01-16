<?php

use Schedule\Classes\DB;
use Schedule\Classes\User;

/**
 * Inicia la sesión de un usuario
 *
 * @return User|null
 */
function login(): User|null {
    if (empty($_POST["username"]) || empty($_POST["password"])) {
        echo "<span>Faltan uno o más campos por rellenar</span>";
    } else {
        $connect = new DB();

        $username = $connect -> clearString($_POST["username"]);
        $password = $connect -> clearString($_POST["password"]);

        $result = $connect -> Select("SELECT id, username, password, email FROM users WHERE username = '$username'");
    
        if (count($result) == 1 && password_verify($password, $result[0]["password"])) {
            $connect -> Update("UPDATE users SET lastAccess = '" . date("Y/m/d H:i:s") . "' WHERE id = '" . $result[0]["id"] . "'");
            
            return new User($result[0]["id"], $result[0]["username"], $result[0]["password"], $result[0]["email"]);
        } else {
            echo "<span>Tus credenciales son incorrectas, inténtalo de nuevo</span>";
        }
    }

    return null;
}

?>