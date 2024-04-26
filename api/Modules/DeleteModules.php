<?php
require '../../includes/init.php';
$id = $_GET['id'];

// Prepare the SQL query
$query = "DELETE FROM `modules` WHERE `Id` = ?";

// Prepare parameters
$param = [$id];

// Execute the query
$result = execute($query, $param);

// Check if deletion was successful
if($result) {
    header("Location: ../../pages/modules/modules-list.php");
}
