<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$query = "SELECT * FROM `leave`";
$queryUser = "SELECT `Id`,`Name` FROM `users`";

$dataUser = select($queryUser); 
$data = select($query); 
?>

<link rel="stylesheet" href="<?= urlOf("assets/plugins/datatables/datatables.min.css") ?>">

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Leaves</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Leaves</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="manage-leave.php" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="add-leave.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>User Id</th>
                                        <th>Started Date</th>
                                        <th>End date</th>
                                        <th>Reason</th>
                                        <th class="text-center">status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row ) {?>
                                    <tr>
                                            <td><?=$row['Id']?></td>
                                                <td>
                                                    <h2>
                                                        <a><?=$row['UserId']?></a>
                                                    </h2>
                                                </td>
                                                    <td><?=$row['DateStart']?></td>
                                                    <td><?=$row['DateEnd']?></td>
                                                    <td><?=$row['Reason']?></td>
                                                    <td class="text-center">
                                                        <div class="actions ml-2">
                                                            <a href="edit-Leave.php?id=<?=$row['Id']?>" class="btn btn-sm bg-success-light mr-2">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <a href="../../api/leaves/deleteLeave.php?id=<?=$row['Id']?>" onclick="return confirm('Are you sure to delete this role')" class="btn btn-sm bg-danger-light">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <?php  }?>
                                        </tr>
                                    
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