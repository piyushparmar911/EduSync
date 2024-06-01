<?php


require '../../includes/init.php';

$Id = $_POST['Id'];
$Name = $_POST['Name'];
$ClassId = $_POST['ClassId'];

$query = "UPDATE `subjects` SET `Name` = ?, `ClassId`= ?  WHERE `id` = ?";

$result = execute($query,[$Name,$ClassId,$Id]);


