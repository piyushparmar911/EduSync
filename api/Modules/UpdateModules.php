<?php

require '../../includes/init.php';


$Id = $_POST['Id'];
$Name = $_POST['Name'];

$query = "UPDATE `modules` SET `Name` = ? WHERE `id` = ?";

$result = execute($query,[$Name,$Id]);

