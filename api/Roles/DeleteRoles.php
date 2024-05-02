<?php 
require '../../includes/init.php';

$Id = $_POST['id'];

$query = "DELETE FROM `roles` WHERE `Id` = ?";

$result = execute($query, [$Id]);

if($result)
{
    header("Location: ../../pages/roles/roles-list.php");
}





