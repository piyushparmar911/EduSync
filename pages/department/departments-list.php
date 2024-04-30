<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$query = "SELECT * FROM `departments`";

$data = select($query); 
?>

<link rel="stylesheet" href="<?= urlOf("assets/plugins/datatables/datatables.min.css") ?>">

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Departments</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Departments</li>
                    </ul>
                </div>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="add-department.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>User Id (Hod)</th>
                                        <th>Started Year</th>
                                        <th>No of Students</th>
                                        <th>Modify</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row) {?>

                                        <tr>
                                            <td><?=$row['Id']?></td>
                                            <td>
                                                <h2>
                                                    <a><?=$row['Name']?></a>
                                                </h2>
                                            </td>
                                            <td><?=$row['UserId']?></td>
                                            <td><?=$row['StartedYear']?></td>
                                            <td><?=$row['NoOfStudent']?></td>
                                            <td class="text-left">
                                                <a href="edit-department.php?id=<?=$row['Id']?>" class="btn btn-sm bg-success-light ml-2">
                                                    <i class="fas fa-pen"></i>
                                                    
                                                </a>
                                            </td>
                                            <td class="text-left">
                                                <a href="../../api/departments/deleteDepartment.php?id=<?=$row['Id']?>" class="btn btn-sm bg-danger-light ml-2">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    
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