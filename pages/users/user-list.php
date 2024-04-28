<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$query = "SELECT * FROM `users`" ;

$data = select($query);
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
                <div class="col-auto text-right float-right ml-auto">
                    <a href="<?= "add-user.php" ?>" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                </div>
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
                                        <th>Subject</th>
                                        <th>LastWork</th>
                                        <th>Experience</th>
                                        <th>Address</th>
                                        <th>Modify</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) {?>

                                        <tr>
                                            <td><?=$row['Id']?></td>
                                            <td><?=$row['Name']?></td>
                                            <td><?=$row['RoleId']?></td>
                                            <td><?=$row['ClassId']?></td>
                                        <td><?=$row['Subject']?></td>
                                        <td><?=$row['LastWork']?></td>
                                        <td><?=$row['Experience']?></td>
                                        <td><?=$row['Address']?></td>
                                        <td class="text-center">
                                            <a href="edit-user.php?id=<?=$row['Id']?>" class="btn btn-sm bg-success-light mr-5">
                                                <i class="fas fa-pen"></i>
                                                
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a href="../../api/users/deleteUser.php?id=<?=$row['Id']?>" class="btn btn-sm bg-danger-light mr-4">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
    include pathOf("./includes/footer.php");
    include pathOf("./includes/pageend.php");
    include pathOf("./includes/script.php");
    ?>