<?php
namespace App\Core;

class Validator {
    public static array $errors = [];

    public static function isVide($field, $key, $message = "Ce champ est obligatoire") {
        if (empty($field)) {
            self::$errors[$key] = $message;
        }
    }

    public static function isNumeric($field, $key, $message = "Veuillez entrer un nombre valide") {
        if (!is_numeric($field)) {
            self::$errors[$key] = $message;
        }
    }

    // Add logic to isEntier method

    public static function validate(): bool {
        return count(self::$errors) === 0;
    }
}
?>
