<?php

namespace Schedule\Classes;
use DateTime;

/**
 * Clase que define un evento
 */
class Event {
    private int $id;
    private int $category;
    private string $name;
    private string $description;
    private DateTime $date;

    private static array $events = [];

    /**
     * Constructor del evento
     *
     * @param integer $id ID del evento
     * @param integer $category Categoría del evento
     * @param string $name Nombre del evento
     * @param string $description Descripción del evento
     * @param string $date Fecha del evento
     */
    public function __construct(int $id, int $category, string $name, string $description, string $date) {
        $this -> id = $id;
        $this -> category = $category;
        $this -> name = $name;
        $this -> description = $description;
        $this -> date = new DateTime($date);

        self::$events[] = $this;
    }

    /**
     * Obtiene la ID del evento
     *
     * @return int
     */
    public function getId(): int {
        return $this -> id;
    }

    /**
     * Obtiene la categoría del evento
     *
     * @return int
     */
    public function getCategory(): int {
        return $this -> category;
    }

    /**
     * Obtiene el nombre del evento
     *
     * @return string
     */
    public function getName(): string {
        return $this -> name;
    }

    /**
     * Obtiene la descripción del evento
     *
     * @return string
     */
    public function getDescription(): string {
        return $this -> description;
    }

    /**
     * Obtiene la fecha del evento
     *
     * @param string $dateFormat Formato de fecha en el que se mostrará el evento
     * @return string
     */
    public function getDate(string $dateFormat = "d/m/Y"): string {
        return $this -> date -> format($dateFormat);
    }

    /**
     * Muestra todos los eventos
     *
     * @param string $dateFormat Formato de fecha en el que se mostrará el evento
     * @return void
     */
    public static function showAllEvents(string $dateFormat = "d/m/Y"): void {
        foreach (self::$events as $event) $event -> show($dateFormat);
    }

    /**
     * Muestra todos los eventos de una categoría
     *
     * @param int $categoryId ID de la categoría
     * @param string $dateFormat Formato de fecha en el que se mostrará el evento
     * @return void
     */
    public static function showCategoryEvents(int $categoryId, string $dateFormat = "d/m/Y"): void {
        foreach (self::$events as $event) {
            if ($event -> getCategory() == $categoryId) $event -> show($dateFormat);
        }
    }

    /**
     * Muestra el evento
     *
     * @param string $dateFormat Formato de fecha en el que se mostrará el evento
     * @return void
     */
    public function show(string $dateFormat = "d/m/Y"): void {
        echo "<tr><td>" . $this -> name . "</td><td>" . $this -> description . "</td><td>" . $this -> date -> format($dateFormat) . "</td><td><form action='./schedule.php' method='post'><input type='hidden' name='eventId' value=" . $this -> id . "><input type='submit' name='delete' value='Borrar'></form></td></tr>";
    }
}

?>