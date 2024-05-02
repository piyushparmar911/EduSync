<?php

require '../../includes/init.php';


$Name = $_POST['Name'];
$UserId = $_POST['UserId'];
$StartedYear = $_POST['StartedYear'];
$NoOfStudent = $_POST['NoOfStudent'];


    $query = "INSERT INTO `departments` (`Name`,`UserId`,`StartedYear`,`NoOfStudent`) VALUES (?,?,?,?)";


    $result = execute($query,[$Name,$UserId,$StartedYear,$NoOfStudent]);


    
    