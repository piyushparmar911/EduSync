<?php

require '../../includes/init.php';

$Name = $_POST['Name'];


    $query = "INSERT INTO `roles` (`Name`) VALUES (?)";


    $result = execute($query,[$Name]);


    
    