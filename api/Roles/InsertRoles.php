<?php

include ("../include.php"); 


$Name = $_POST['Name'];
// $ModuleId = $_POST['ModuleId'];


    $query = "INSERT INTO `roles` (`Name`,`ModuleId`) VALUES (?,?)";
    $param = [$Name,$ModuleId];

    $statement = $connection->prepare($query);
    $data = $statement->execute($param);


    if($data)
    {
        echo "inserted Role";
    }

    mysqli_close($connection);
    