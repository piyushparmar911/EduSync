<?php

require '../../includes/init.php';


$Name = $_POST['Name'];
$Boys = $_POST['Boys'];
$Girls = $_POST['Girls'];
$TotalStudent = $_POST['TotalStudent'];


    $query = "INSERT INTO `class` (`Name`,`Boys`,`Girls`,`TotalStudents`) VALUES (?,?,?,?)";
    $param = [$Name,$Boys,$Girls,$TotalStudent];

    $result = execute($query,$param);
    

    if($result)
    {
        echo "inserted Role";
    }






