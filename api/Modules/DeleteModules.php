<?php
require '../../includes/init.php';
$id = $_GET['id'];

$query = "DELETE FROM `modules` WHERE `Id` = ?";

$param = [$id];

$result = execute($query, $param);

if($result) {
    header("Location: ../../pages/modules/modules-list.php");
}
