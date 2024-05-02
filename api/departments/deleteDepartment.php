<?php
require '../../includes/init.php';
$id = $_POST['id'];

$query = "DELETE FROM `departments` WHERE `Id` = ?";


$result = execute($query,[$id]);

if($result) {
    header("Location: ../../pages/department/departments-list.php");
}
