<?php
include ("../include.php");



$Id = $_POST['Id'];
$RoleId = $_POST['RoleId'];
$Name = $_POST['Name'];
$Subject = $_POST['Subject'];
$Address = $_POST['Address'];
$Password = $_POST['Password'];
$Experience = $_POST['Experience'];
$ExperienceGain = $_POST['ExperienceGain'];
$LastDegree = $_POST['LastDegree'];
$LastWork = $_POST['LastWork'];
$Salary = $_POST['Salary'];


$query = "UPDATE `users` SET  `RoleId` = ? , `Name` = ? ,`Subject` = ? ,`Address` = ? , `Password` = ? , 
`Experience` = ?, `ExperienceGain` = ? , `LastDegree`= ? ,`LastWork` = ?, `Salary`= ? WHERE `Id`= ? ";

$param = [$RoleId,$Name,$Subject,$Address,$Password,$Experience,$ExperienceGain, $LastDegree,$LastWork,$Salary,$Id];


$statement = $connection->prepare($query);
$data = $statement->execute($param);

if($data)
{
    echo "updated sucessfully";
}

mysqli_close($connection);