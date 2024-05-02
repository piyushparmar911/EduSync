<?php

require '../../includes/init.php';


$UserId = $_POST['UserId'];
$DateStart = $_POST['DateStart'];
$DateEnd = $_POST['DateEnd'];
$Reason = $_POST['Reason'];


    $query = "INSERT INTO `leave` (`UserId`,`DateStart`,`DateEnd`,`Reason`) VALUES (?,?,?,?)";


    $result = execute($query,[$UserId,$DateStart,$DateEnd,$Reason]);


    
    if ($result)
    {
        echo "inserted event";
    }