<?php

require '../../includes/init.php';


$Id = $_POST['Id'];
$Name = $_POST['Name'];
$Boys = $_POST['Boys'];
$Girls = $_POST['Girls'];
$TotalStudents = $_POST['TotalStudents'];

$query = "UPDATE `class` SET `Name` = ?,`Boys` = ?,`Girls`= ?,`TotalStudents`= ? WHERE `Id` = ?";

$result = execute($query,[$Name,$Boys,$Girls,$TotalStudents,$Id]);



