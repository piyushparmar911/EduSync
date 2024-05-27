<?php

require '../includes/init.php';
header("Content-type:application/json");

$userId = $_POST['userId'];
$moduleId = $_POST['moduleId'];
$action = $_GET['action'];

echo $userId;
echo $moduleId;
echo $action;


if ($action == 'addPermission') {
    $addPermission = $_POST['addPermission'];
    $query = "UPDATE Permissions SET AddPermission = ? WHERE UserId = ? AND ModuleId = ?";
    $params = [$addPermission, $userId, $moduleId];
    $result = execute($query, $params);
}

if ($action == 'editPermission') {
    $editPermission = $_POST['editPermission'];
    $query = "UPDATE Permissions SET EditPermission = ? WHERE UserId = ? AND ModuleId = ?";
    $params = [$editPermission, $userId, $moduleId];
    $result = execute($query, $params);
}

if ($action == 'deletePermission') {
    $deletePermission = $_POST['deletePermission'];
    $query = "UPDATE Permissions SET DeletePermission = ? WHERE UserId = ? AND ModuleId = ?";
    $params = [$deletePermission, $userId, $moduleId];
    $result = execute($query, $params);
}

if ($action == 'viewPermission') {
    $viewPermission = $_POST['viewPermission'];
    $query = "UPDATE Permissions SET ViewPermission = ? WHERE UserId = ? AND ModuleId = ?";
    $params = [$viewPermission, $userId, $moduleId];
    $result = execute($query, $params);
}

if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);
