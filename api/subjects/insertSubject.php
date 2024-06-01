<?php

require '../../includes/init.php';


$Name = $_POST['Name'];
$ClassId = $_POST['ClassId'];


    $query = "INSERT INTO `subjects` (`Name`,`ClassId`)  VALUES (?,?)";
    $result = execute($query,[$Name,$ClassId]);

    







