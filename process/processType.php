<?php
require_once "../classes/TypeDAO.class.php";

$types = TypeDAO::findAll();
echo json_encode($types);
