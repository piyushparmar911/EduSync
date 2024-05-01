<?php

require '../../includes/init.php';


$UserId = $_POST['UserId'];
$Name = $_POST['Name'];
$DateTime = $_POST['DateTime'];
$Place = $_POST['Place'];


    $query = "INSERT INTO `event` (`UserId`,`Name`,`DateTime`,`Place`) VALUES (?,?,?,?)";


    $result = execute($query,[$UserId,$Name,$DateTime,$Place]);


    
    if ($result)
    {
        echo "inserted event";
    }