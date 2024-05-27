<?php
require("../../includes/init.php");
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Roles', $UserId);
$query = "SELECT * FROM roles";
$roles = select($query);
$index = 0;
include pathOf("./includes/header.php");
include pathOf("./includes/sidebar.php");

?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Roles</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Roles</li>
                    </ul>
                </div>
                <?php if ($permissions['AddPermission'] == 1) { ?>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="add-role.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Role Name</th>
                                        
                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                                <th>Modify</th>
                                            <?php } ?>
                                            <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                <th>Delete</th>
                                            <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($permissions['ViewPermission'] == 1) {
                                    foreach ($roles as $role): ?>
                                        <tr>
                                            <td><?= $index += 1 ?></td>
                                            <td>
                                                <h2><a><?= $role['Name'] ?></a></h2>
                                            </td>
                                            <?php if ($permissions['EditPermission'] == 1) { ?>

                                            <form action="./edit-role" method="post">
                                                            <td>
                                                                <input type="hidden" name="id" id="Id" value="<?= $role['Id'] ?>">
                                                                <button type="submit" class="btn btn-info btn-circle mb-2">
                                                                    <i class="fa fa-edit"></i>
                                                                </button>
                                                            </td>
                                                        </form>
                                                    <?php } ?>

                                                    <?php if ($permissions['DeletePermission'] == 1) { ?>

                                                <td>
                                                    <button type="submit" class="btn btn-primary btn-circle mb-2"
                                                        onclick="deleteRole(<?= $role['Id'] ?>)">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                                <?php } ?>
                                                </tr>
                                                <?php endforeach;
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    function deleteRole(roleId)
    {
        if(confirm("are you sure you want to delete this role"));
        $.ajax({
            url: "../../api/roles/deleteRoles.php",
            method : "POST",
            data  : {
                id : roleId
            },
            success: function(response){
                    if(response)
                    location.reload();
            }
        })
    }
</script>
    <?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>

