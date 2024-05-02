<?php
require '../../includes/init.php';
$id = $_POST['id'];

$query = "DELETE FROM `leave` WHERE `Id` = ?";


$result = execute($query,[$id]);

if($result) {
    header("Location: ../../pages/leave/leave-list.php");
}
