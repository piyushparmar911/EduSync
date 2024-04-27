<?php

require '../../includes/init.php';


$Name = $_POST['Name'];

$query = "INSERT INTO `modules` (`Name`) VALUES (?)";
$param = [$Name];

$result = execute($query,$param);
