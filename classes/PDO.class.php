<?php

class Database {
    private static $host = "localhost";
    private static $db   = "formationFront";
    private static $user = "root";
    private static $pass = "";
    private static $pdo  = null;

    public static function getPDO() {
        if (self::$pdo === null) {
            try {
                self::$pdo = new PDO(
                    "mysql:host=" . self::$host . ";dbname=" . self::$db . ";charset=utf8",
                    self::$user,
                    self::$pass
                );
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Erreur connexion : " . $e->getMessage());
            }
        }
        return self::$pdo;
    }
}
