<?php

include ("../include.php");


$Id = $_POST['Id'];
$Name = $_POST['Name'];

$query = "UPDATE `modules` SET `Name` = ? WHERE `id` = ?";
$param = [$Name,$Id];

$statement= $connection->prepare($query);
$data = $statement->execute($param);

if($data)
{
    echo "updated successfully";
}

mysqli_close($connection);