<?php
include ("../include.php");


$Id = $_POST['Id'];


$query = "DELETE FROM `modules` WHERE   `Id` = ?";
$param = [$Id];

$statement = $connection->prepare($query);
$data = $statement->execute($param);


if($data)
{
    echo "deleted successfully";
}

mysqli_close($connection);