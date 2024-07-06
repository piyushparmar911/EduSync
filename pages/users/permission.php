<?php
require("../../includes/init.php");

// Check user permissions (uncomment if needed)
// if ($userPermission['AddPermission'] != 1)
//     header("Location:./index");

$userPermissionId = $_POST['Id'];
$permissions = select("SELECT Modules.Name AS 'ModuleName', Modules.Id, Users.Name, Permissions.AddPermission, Permissions.EditPermission, Permissions.DeletePermission, Permissions.ViewPermission FROM Permissions INNER JOIN Modules ON Permissions.ModuleId = Modules.Id INNER JOIN Users ON Permissions.UserId = Users.Id WHERE Permissions.UserId =?", [$userPermissionId]);

$UserId = $_SESSION['UserId'];
$userPermission = authenticate('Users', $UserId);

$index = 0;
include pathOf("./includes/header.php");
include pathOf("./includes/sidebar.php");
?>
<div class="main-content my-5 py-5">
    <div class="content-wrapper-area my-5">
        <div class="data-table-area">
            <div class="container">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body card-breadcrumb">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0">User</h4>
                                    <div class="page-title-right">
                                        <a href="./add-user" class="btn btn-primary mb-2">Add</a>
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
                                                <td><?= ++$index ?></td>
                                                <td><?= $permission['ModuleName'] ?></td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input addPermission" type="checkbox" id="addPermission<?= $permission['Id'] ?>"
                                                               <?= $permission['AddPermission'] == 1 ? 'checked' : '' ?>
                                                               onchange="updatePermission('addPermission', <?= $permission['Id'] ?>, <?= $permission['AddPermission'] ?>)">
                                                        <label class="form-check-label" for="addPermission<?= $permission['Id'] ?>"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input editPermission" type="checkbox" id="editPermission<?= $permission['Id'] ?>"
                                                               <?= $permission['EditPermission'] == 1 ? 'checked' : '' ?>
                                                               onchange="updatePermission('editPermission', <?= $permission['Id'] ?>, <?= $permission['EditPermission'] ?>)">
                                                        <label class="form-check-label" for="editPermission<?= $permission['Id'] ?>"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input viewPermission" type="checkbox" id="viewPermission<?= $permission['Id'] ?>"
                                                               <?= $permission['ViewPermission'] == 1 ? 'checked' : '' ?>
                                                               onchange="updatePermission('viewPermission', <?= $permission['Id'] ?>, <?= $permission['ViewPermission'] ?>)">
                                                        <label class="form-check-label" for="viewPermission<?= $permission['Id'] ?>"></label>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-check">
                                                        <input class="form-check-input deletePermission" type="checkbox" id="deletePermission<?= $permission['Id'] ?>"
                                                               <?= $permission['DeletePermission'] == 1 ? 'checked' : '' ?>
                                                               onchange="updatePermission('deletePermission', <?= $permission['Id'] ?>, <?= $permission['DeletePermission'] ?>)">
                                                        <label class="form-check-label" for="deletePermission<?= $permission['Id'] ?>"></label>
                                                    </div>
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
        function updatePermission(action, moduleId, permission) {
            let newPermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                [action]: newPermission
            };

            $.post(`../../api/updatePermission.php?action=${action}`, data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                // Optionally, update the checkbox state without reloading
                 window.location.reload();
            });
        }
    </script>
    <?php
    include pathOf('includes/pageEnd.php');
    ?>
</div>
