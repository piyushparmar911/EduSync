<?php


require '../../includes/init.php';


$RoleId = $_POST['RoleId'];
$Name = $_POST['Name'];
$ClassId = $_POST['ClassId'];
$Subject = $_POST['Subject'];
$Address = $_POST['Address'];
$Password = $_POST['Password'];
$Experience = $_POST['Experience'];
$ExperienceGain = $_POST['ExperienceGain'];
$LastDegree = $_POST['LastDegree'];
$LastWork = $_POST['LastWork'];
$Salary = $_POST['Salary'];



$query = "INSERT INTO `users` (`RoleId`,`Name`,`ClassId`,`Subject`, `Address`,`Password`,`Experience`,`ExperienceGain`,`LastDegree`,`LastWork`,
                                `Salary`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";


$result = execute($query,[$RoleId,$Name,$ClassId,$Subject,$Address,$Password,$Experience,$ExperienceGain, $LastDegree,$LastWork,$Salary]);

if($result)
{
    echo "Success";
}