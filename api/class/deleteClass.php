<?php
require '../../includes/init.php';
header('Content-Type: application/json');
$id = $_POST['id'];
$query = "DELETE FROM `class` WHERE `Id` = ?";


$result = execute($query,[$id]);

if($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);


?>