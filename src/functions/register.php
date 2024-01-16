<?php

use Schedule\Classes\DB;
use Schedule\Classes\User;

/**
 * Registra un usuario en la base de datos
 *
 * @return User|null
 */
function register(): User|null {
    if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
        echo "<span>Faltan uno o más campos por rellenar</span>";
    } else {
        $connect = new DB();

        $username = $connect -> clearString($_POST["username"]);
        $password = $connect -> clearString(password_hash($_POST["password"], PASSWORD_DEFAULT));
        $email = $connect -> clearString($_POST["email"]);

        $result = $connect -> Select("SELECT id FROM users WHERE username = '$username'");

        if (count($result) == 0) {
            $connect -> Insert("INSERT INTO users (username, password, email, lastAccess) VALUES ('$username', '$password', '$email', '" . date("Y/m/d H:i:s") . "')");
            $result = $connect -> Select("SELECT id, username, password, email FROM users WHERE username = '$username'");

            return new User($result[0]["id"], $result[0]["username"], $result[0]["password"], $result[0]["email"]);
        } else {
            echo "<span>Ya existe este nombre de usuario, por favor utiliza otro distinto</span>";
        }
    }

    return null;
}

?>