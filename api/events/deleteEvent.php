<?php
require '../../includes/init.php';
$id = $_POST['id'];

$query = "DELETE FROM `event` WHERE `Id` = ?";


$result = execute($query,[$id]);

if($result) {
    header("Location: ../../pages/events/events.php");
}
