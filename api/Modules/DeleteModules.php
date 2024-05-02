<?php
require '../../includes/init.php';
$id = $_POST['id'];

$query = "DELETE FROM `modules` WHERE `Id` = ?";


$result = execute($query,[$id]);

if($result) {
    header("Location: ../../pages/modules/modules-list.php");
}
