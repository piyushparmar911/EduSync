<?php

require '../../includes/init.php';


$Id = $_POST['Id'];
$UserId = $_POST['UserId'];
$Name = $_POST['Name'];
$DateTime = $_POST['DateTime'];
$Place = $_POST['Place'];

$query = "UPDATE `event` SET `UserId` = ?,`Name` = ?,`DateTime`= ?,`Place`= ? WHERE `Id` = ?";

$result = execute($query,[$UserId,$Name,$DateTime,$Place,$Id]);



