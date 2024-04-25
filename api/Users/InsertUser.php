<?php


include ("../include.php");

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



$query = "INSERT INTO `users` (`RoleId`,`Name`,`Subject`, `Address`,`Password`,`Experience`,`ExperienceGain`,`LastDegree`,`LastWork`,
                                `Salary`) VALUES (?,?,?,?,?,?,?,?,?,?)";

$param = [$RoleId,$Name,$Subject,$Address,$Password,$Experience,$ExperienceGain, $LastDegree,$LastWork,$Salary];

$statement = $connection->prepare($query);
$data = $statement->execute($param);

if($data)
{
    echo "inserted user sucessfully";
}

mysqli_close($connection);