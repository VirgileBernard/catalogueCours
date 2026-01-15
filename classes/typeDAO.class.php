<?php
require_once "PDO.class.php";
require_once "Type.class.php";

class TypeDAO {

    public static function findAll() {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM type");
        $result = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Type($row['idType'], $row['libelle']);
        }
        return $result;
    }

    public static function findById($id) {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM type WHERE idType = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Type($row['idType'], $row['libelle']);
        }
        return null;
    }
}
