<?php

require '../../includes/init.php';


$Id = $_POST['Id'];
$Name = $_POST['Name'];

$query = "UPDATE `modules` SET `Name` = ? WHERE `id` = ?";
$param = [$Name,$Id];

$result = execute($query,$param);

