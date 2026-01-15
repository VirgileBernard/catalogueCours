<?php
require_once "../classes/CoursDAO.class.php";

$action = $_GET['action'] ?? null;

switch ($action) {

    case "all":
        $cours = CoursDAO::findAll();
        echo json_encode($cours);
        break;

    case "id":
        $id = $_GET['id'] ?? null;
        echo json_encode(CoursDAO::findById($id));
        break;

    case "type":
        $idType = $_GET['idType'] ?? null;
        echo json_encode(CoursDAO::findByType($idType));
        break;

    default:
        echo json_encode(["error" => "Action inconnue"]);
}
