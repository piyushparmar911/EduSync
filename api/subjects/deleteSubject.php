<?php 
require '../../includes/init.php';

$Id = $_POST['id'];

$query = "DELETE FROM `subjects` WHERE `Id` = ?";

$result = execute($query, [$Id]);


if($result)
{
    header("Location: ../../pages/subjects/subjects-list.php");
}






