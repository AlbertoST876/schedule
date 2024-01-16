<?php

namespace Schedule\Classes;

/**
 * Clase que define un usuario
 */
class User {
    private int $id;
    private string $name;
    private string $password;
    private string $email;

    /**
     * Constructor del usuario
     *
     * @param int $id ID del usuario
     * @param string $name Nombre del usuario
     * @param string $password Contraseña del usuario
     * @param string $email Email del usuario
     */
    public function __construct(int $id, string $name, string $password, string $email) {
        $this -> id = $id;
        $this -> name = $name;
        $this -> password = $password;
        $this -> email = $email;
    }

    /**
     * Devuelve la ID del usuario
     *
     * @return int
     */
    public function getId(): int {
        return $this -> id;
    }

    /**
     * Devuelve el nombre del usuario
     *
     * @return string
     */
    public function getName(): string {
        return $this -> name;
    }

    /**
     * Obtiene la contraseña del usuario
     *
     * @return string
     */
    public function getPassword(): string {
        return $this -> password;
    }

    /**
     * Obtiene el email del usuario
     *
     * @return string
     */
    public function getEmail(): string {
        return $this -> email;
    }
}

?>