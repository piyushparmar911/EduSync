<?php

require '../../includes/init.php';


$Name = $_POST['Name'];
$Boys = $_POST['Boys'];
$Girls = $_POST['Girls'];
$TotalStudent = $_POST['TotalStudent'];
$Id = $_POST['Id'];


    $query = "INSERT INTO `class` (`Name`,`Boys`,`Girls`,`TotalStudents`,`Id`) VALUES (?,?,?,?,?)";
    $param = [$Name,$Boys,$Girls,$TotalStudent,$Id];

    $result = execute($query,$param);
    

    if($result)
    {
        echo "inserted Role";
    }






