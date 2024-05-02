<?php

require '../../includes/init.php';


$Id = $_POST['Id'];
$UserId = $_POST['UserId'];
$DateStart = $_POST['DateStart'];
$DateEnd = $_POST['DateEnd'];
$Reason = $_POST['Reason'];


$query = "UPDATE `leave` SET `UserId` = ?,`DateStart` = ?,`DateEnd`= ?,`Reason`= ? WHERE `Id` = ?";

$result = execute($query,[$UserId,$DateStart,$DateEnd,$Reason,$Id]);



