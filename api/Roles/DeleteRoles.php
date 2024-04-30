<?php 
require '../../includes/init.php';

$Id = $_GET['id'];

$query = "DELETE FROM `roles` WHERE `Id` = ?";

$result = execute($query, [$Id]);

if($result == true )
{
    header("Location: ../../pages/roles/roles-list.php");
}
else
{
    header('location: ../../pages/roles/roles-list.php');
}





