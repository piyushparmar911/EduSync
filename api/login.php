<?php

require '../includes/init.php';
header("Content-type:application/json");

$Name = $_POST['Name'];
$Password = $_POST['Password'];

$query = "SELECT * FROM Users WHERE Name =? AND Password =?";
$params = [$Name, $Password];

$result = selectOne($query, $params);
if ($result) {
    echo json_encode(["success" => true]);
    $_SESSION['LoggedIn'] = true;
    $_SESSION['UserId'] = $result['Id'];
} else {
    echo json_encode(["success" => false]);
}