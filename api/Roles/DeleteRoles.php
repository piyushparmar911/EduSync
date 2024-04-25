<?php 

include ("../include.php");

$Id = $_POST['Id'];

$query = "DELETE FROM `roles` WHERE `Id` = ?";
$param = [$Id];

$statement = $connection->prepare($query);
$data = $statement->execute($param);

if ($data)
{
    echo "deleted";
}
mysqli_close($connection);