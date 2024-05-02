<?php

require '../../includes/init.php';


$Id = $_POST['Id'];
$Name = $_POST['Name'];
$UserId = $_POST['UserId'];
$StartedYear = $_POST['StartedYear'];
$NoOfStudent = $_POST['NoOfStudent'];

$query = "UPDATE `departments` SET `Name` = ?,`UserId` = ?,`StartedYear`= ?,`NoOfStudent`= ? WHERE `Id` = ?";

$result = execute($query,[$Name,$UserId,$StartedYear,$NoOfStudent,$Id]);



