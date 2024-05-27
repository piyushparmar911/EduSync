<?php
require("../../includes/init.php");
// if ($userPermission['AddPermission'] != 1)
//     header("Location:./index");
$userPermissionId = $_POST['Id'];
$permissions = select("SELECT Modules.Name AS 'ModuleName', Modules.Id, Users.Name, Permissions.AddPermission, Permissions.EditPermission, Permissions.DeletePermission, Permissions.ViewPermission FROM Permissions INNER JOIN Modules ON Permissions.ModuleId = Modules.Id INNER JOIN Users ON Permissions.UserId = Users.Id WHERE Permissions.UserId =?", [$userPermissionId]);

$UserId = $_SESSION['UserId'];
$userPermission = authenticate('Users', $UserId);

$index = 0;
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>
<div class="main-content my-5 py-5">
    <div class="content-wraper-area">
        <div class="data-table-area">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body card-breadcrumb">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">User</h4>
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active"> <a href="./add-user"
                                                    class="btn btn-success mb-2 me-2">Add</a> </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="selection-datatable" class="table dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Sr No.</th>
                                            <th>Modules</th>
                                            <th>Add Permission</th>
                                            <th>Edit Permission</th>
                                            <th>View Permission</th>
                                            <th>Delete Permission</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($permissions as $permission): ?>
                                            <tr>
                                                <input type="hidden" value="<?= $userPermissionId ?>" id="UserId">
                                                <td><?= $index += 1 ?></td>
                                                <td><?= $permission['ModuleName'] ?></td>
                                                <td><input type="checkbox" id="addPermission"
                                                        <?= $permission['AddPermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="addPermission(<?= $permission['Id'] ?>, <?= $permission['AddPermission'] ?>)">
                                                </td>
                                                <td><input type="checkbox" id="editPermission"
                                                        <?= $permission['EditPermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="editPermission(<?= $permission['Id'] ?>, <?= $permission['EditPermission'] ?>)">
                                                </td>
                                                <td><input type="checkbox" id="viewPermission"
                                                        <?= $permission['ViewPermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="viewPermission(<?= $permission['Id'] ?>, <?= $permission['ViewPermission'] ?>)">
                                                </td>
                                                <td><input type="checkbox" id="deletePermission"
                                                        <?= $permission['DeletePermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="deletePermission(<?= $permission['Id'] ?>, <?= $permission['DeletePermission'] ?>)">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div> <!-- end card body-->
                        </div> <!-- end card -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include pathOf('includes/footer.php');
    include pathOf('includes/script.php');
    ?>
    <script>
        function addPermission(moduleId, permission) {
            let addPermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                addPermission: addPermission
            }

            $.post('../../api/updatePermission.php?action=addPermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }

        function editPermission(moduleId, permission) {
            let editPermission = permission == 1 ? 0 : 1;
            
            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                editPermission: editPermission
            }

            $.post('../../api/updatePermission.php?action=editPermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }

        function deletePermission(moduleId, permission) {
            let deletePermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                deletePermission: deletePermission
            }

            $.post('../../api/updatePermission.php?action=deletePermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }

        function viewPermission(moduleId, permission) {
            let viewPermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                viewPermission: viewPermission
            }

            $.post('../../api/updatePermission.php?action=viewPermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }
    </script>
    <?php
    include pathOf('includes/pageEnd.php');
    ?>