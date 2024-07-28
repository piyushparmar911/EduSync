<?php


require '../../includes/init.php';


$RoleId = $_POST['RoleId'];
$Name = $_POST['Name'];
$ClassId = $_POST['ClassId'];
$Subject = $_POST['Subject'];
$Address = $_POST['Address'];
$Password = $_POST['Password'];
$Email = $_POST['Email'];
$Experience = $_POST['Experience'];
$ExperienceGain = $_POST['ExperienceGain'];
$LastDegree = $_POST['LastDegree'];
$LastWork = $_POST['LastWork'];
$Salary = $_POST['Salary'];



$query = "INSERT INTO `users` (`RoleId`,`Name`,`ClassId`,`Subject`, `Address`,`Email`,`Password`,`Experience`,`ExperienceGain`,`LastDegree`,`LastWork`,
                                `Salary`) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";


$result = execute($query,[$RoleId,$Name,$ClassId,$Subject,$Address,$Email,$Password,$Experience,$ExperienceGain, $LastDegree,$LastWork,$Salary]);

$userId = lastInsertId();
$permissionQuery = "INSERT INTO Permissions (UserId,ModuleId,AddPermission,EditPermission,DeletePermission,ViewPermission) VALUES(?,?,?,?,?,?)";

$rolesPermissionParams = [$userId, 1, 0, 0, 0, 0];
$cityPermissionParams = [$userId, 2, 0, 0, 0, 0];
$branchdetailsPermissionParams = [$userId, 3, 0, 0, 0, 0];
$userPermissionParams = [$userId, 4, 0, 0, 0, 0];
$categoriesPermissionParams = [$userId, 5, 0, 0, 0, 0];
$productsPermissionParams = [$userId, 6, 0, 0, 0, 0];
$stocksPermissionParams = [$userId, 7, 0, 0, 0, 0];
$purchasePermissionParams = [$userId, 8, 0, 0, 0, 0];
$salesPermissionParams = [$userId, 9, 0, 0, 0, 0];
$expensesPermissionParams = [$userId, 10, 0, 0, 0, 0];

execute($permissionQuery, $rolesPermissionParams);
execute($permissionQuery, $cityPermissionParams);
execute($permissionQuery, $branchdetailsPermissionParams);
execute($permissionQuery, $userPermissionParams);
execute($permissionQuery, $categoriesPermissionParams);
execute($permissionQuery, $productsPermissionParams);
execute($permissionQuery, $stocksPermissionParams);
execute($permissionQuery, $purchasePermissionParams);
execute($permissionQuery, $salesPermissionParams);
execute($permissionQuery, $expensesPermissionParams);

if ($result)
    echo json_encode(["success" => true]);
else
    echo json_encode(["success" => false]);

?>