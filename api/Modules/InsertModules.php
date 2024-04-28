<?php

require '../../includes/init.php';


$Name = $_POST['Name'];

$query = "INSERT INTO `modules` (`Name`) VALUES (?)";

$result = execute($query,[$Name]);
