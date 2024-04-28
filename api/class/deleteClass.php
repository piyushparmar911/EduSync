<?php
require '../../includes/init.php';
$id = $_GET['id'];

$query = "DELETE FROM `class` WHERE `Id` = ?";


$result = execute($query,[$id]);

if($result) {
    header("Location: ../../pages/class/class-list.php");
}
