<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$UserId = $_SESSION['UserId'];
$permissions = authenticate('Department', $UserId);
$query = "SELECT * FROM `departments`";
$index = 0;
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
                <?php if ($permissions['AddPermission'] == 1) { ?>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="add-department.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>User Id (Hod)</th>
                                        <th>Started Year</th>
                                        <th>No of Students</th>
                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                                <th class="pr-2">Modify</th>
                                            <?php } ?>
                                            <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                <th class="pr-2">Delete</th>
                                            <?php } ?>
                               
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                <?php if ($permissions['ViewPermission'] == 1) {
                                            foreach ($data as $row): ?>

                                        <tr>
                                            <td><?=$index += 1?></td>
                                            <td>
                                                <h2>
                                                    <a><?=$row['Name']?></a>
                                                </h2>
                                            </td>
                                            <td><?=$row['UserId']?></td>
                                            <td><?=$row['StartedYear']?></td>
                                            <td><?=$row['NoOfStudent']?></td>
                                            <!-- <td class="text-left"> -->
                                            <?php if ($permissions['EditPermission'] == 1) { ?>
                                          <td>
                                                           <form action="./edit-department" method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?= $row['Id'] ?>">
                                                            <button type="submit" class="btn ml-1 btn-info btn-circle mb-2">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                         </form>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                    <td>
                                                        <button type="submit" class="btn ml-1 btn-primary btn-circle mb-2"
                                                            onclick="deleteDepartment(<?= $row['Id'] ?>)">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    <!-- </td> -->
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
    function deleteDepartment(Id)
    {
        if(confirm("are you sure you want to delete this role"));
        $.ajax({
            url: "../../api/departments/deleteDepartment.php",
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

</script>
    <?php
    include pathOf("./includes/footer.php");
    include pathOf("./includes/pageend.php");
    include pathOf("./includes/script.php");
    ?>