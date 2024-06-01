<?php
require("../../includes/init.php");
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Users', $UserId);
$query = "SELECT * FROM `users`" ;
$index = 0;
$data = select($query);
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>




<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ul>
                </div>
                <?php if ($permissions['AddPermission'] == 1) { ?>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="<?= "add-user.php" ?>" class="btn btn-primary"><i class="fas fa-plus" accesskey="+"></i></a>
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
                                        <th>Name</th>
                                        <th>RoleId</th>
                                        <th>ClassId</th>
                                        <th>LastWork</th>
                                        <th>Experience</th>
                                        <th>Address</th>
                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                                <th class="">Permission</th>
                                            <?php } ?>
                                            <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                <th class="">Modify</th>
                                            <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if ($permissions['ViewPermission'] == 1) {
                                    foreach ($data as $row): ?>
                                        <tr>
                                            <td><?=$index += 1?></td>
                                            <td><?=$row['Name']?></td>
                                            <td><?=$row['RoleId']?></td>
                                            <td><?=$row['ClassId']?></td>
                                        <td><?=$row['LastWork']?></td>
                                        <td><?=$row['Experience']?></td>
                                        <td><?=$row['Address']?></td>
                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                                        <form action="./permission" method="post">
                                                            <td>
                                                                <input type="hidden" name="Id" id="Id" value="<?= $row['Id'] ?>">
                                                                <button type="submit" class="btn ml-3 btn-secondary btn-circle mb-2">
                                                                    <i class="fa fa-lock"></i>
                                                                </button>
                                                            </td>
                                                        </form>
                                                    <?php } ?>
                                                    <?php if ($permissions['EditPermission'] == 1) { ?>

                                                        <form action="./edit-user" method="post">
                                                            <td>
                                                                <input type="hidden" name="Id" value="<?= $row['Id'] ?>">
                                                                <button type="submit" class="btn ml-2 btn-primary btn-circle mb-2">
                                                                    <i class="fa fa-edit" ></i>
                                                                </button>
                                                            </td>
                                                        </form>
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
    function deleteUser(Id)
    {
        if(confirm("are you sure you want to delete this role"));
        $.ajax({
            url: "../../api/users/deleteUser.php",
            method : "POST",
            data  : {
                id : Id
            },
            success: function(response){
                    if(response)
                    location.reload();
            }
        })
    }

    

    function editUser(Id) {
        $.ajax({
            type: "POST",
            url: "edit-user.php",
            data: {
                id: Id
            },
            success: function(response) {
                $("body").html(response);
            }
        });
    }
</script>

    <?php
    include pathOf("./includes/footer.php");
    include pathOf("./includes/pageend.php");
    include pathOf("./includes/script.php");
    ?>