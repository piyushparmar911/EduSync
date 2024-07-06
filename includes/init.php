<?php

define("BASE_DIR", $_SERVER['DOCUMENT_ROOT'] . "/EduSync");
define("BASE_URL", "/EduSync");

date_default_timezone_set('Asia/Kolkata');

try {
    $connection = new PDO("mysql:host=localhost;port=3306;dbname=EduSync", "root", "");
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

function pathOf($path)
{
    return BASE_DIR . "/" . $path;
}

function urlOf($path)
{
    return BASE_URL . '/' . $path;
}

function execute($query, $params = null)
{
    global $connection;

    $statement = $connection->prepare($query);
    return $statement->execute($params);
}

function selectOne($query, $params = null)
{
    global $connection;

    $statement = $connection->prepare($query);
    $statement->execute($params);

    $row = $statement->fetch(PDO::FETCH_ASSOC);
    return $row;
}

function select($query, $params = null)
{
    global $connection;

    $statement = $connection->prepare($query);
    $statement->execute($params);

    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function lastInsertId()
{
    global $connection;
    return $connection->lastInsertId();
}

function getLastError()
{
    global $connection;
    return $connection->errorInfo();
}

function authenticate($moduleName, $userId)
{
    global $connection;
    $statement = $connection->prepare("SELECT permissions.AddPermission, permissions.EditPermission, permissions.DeletePermission, permissions.ViewPermission FROM permissions INNER JOIN users ON users.Id = permissions.UserId INNER JOIN modules ON modules.Id = permissions.ModuleId WHERE modules.Name = ? AND users.Id = ?");
    $statement->execute([$moduleName, $userId]);

    $rows = $statement->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

session_start();
?>
