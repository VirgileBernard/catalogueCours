<?php
require_once "PDO.class.php";
require_once "Cours.class.php";

class CoursDAO {

    public static function findAll() {
        $pdo = Database::getPDO();
        $stmt = $pdo->query("SELECT * FROM cours");
        $result = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Cours(
                $row['idCours'],
                $row['libelle'],
                $row['description'],
                $row['image'],
                $row['idType']
            );
        }
        return $result;
    }

    public static function findById($id) {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM cours WHERE idCours = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Cours(
                $row['idCours'],
                $row['libelle'],
                $row['description'],
                $row['image'],
                $row['idType']
            );
        }
        return null;
    }

    public static function findByType($idType) {
        $pdo = Database::getPDO();
        $stmt = $pdo->prepare("SELECT * FROM cours WHERE idType = ?");
        $stmt->execute([$idType]);

        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $result[] = new Cours(
                $row['idCours'],
                $row['libelle'],
                $row['description'],
                $row['image'],
                $row['idType']
            );
        }
        return $result;
    }
}
