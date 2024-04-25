<?php


include ("../include.php");

$Id = $_POST['Id'];
$Name = $_POST['Name'];
$ModuleId = $_POST['ModuleId'];

$query = "UPDATE `roles` SET `Name` = ? , `ModuleId` = ? WHERE `Id` = ?";
$param = [$Name,$ModuleId,$Id];

$statement = $connection->prepare($query);
$data = $statement->execute($param);


if($data)
{
    echo "updated successfully";
}

mysqli_close($connection);