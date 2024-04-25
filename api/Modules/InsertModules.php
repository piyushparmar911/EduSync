<?php

include ("../include.php");

    
    $Name = $_POST['Name'];
    $query = "INSERT INTO `modules` (`Name`) VALUES (?)";
    $param = [$Name]; 

$statement = $connection->prepare($query);
$data = $statement->execute($param);

if($data)
{
    echo "Inserted";
}


mysqli_close($connection);
