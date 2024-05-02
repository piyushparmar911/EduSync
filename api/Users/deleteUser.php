<?php 
require '../../includes/init.php';

$Id = $_POST['id'];

$query = "DELETE FROM `users` WHERE `Id` = ?";

$result = execute($query, [$Id]);

if($result )
{
    header("Location: ../../pages/users/user-list.php");
}





