<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");



$UserId = $_SESSION['UserId'];
$permissions = authenticate('Leave', $UserId);
$query = "SELECT * FROM `leave`";
$queryUser = "SELECT `Id`,`Name` FROM `users`";
$index = 0;
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
                <?php if ($permissions['AddPermission'] == 1) { ?>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="add-leave.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                        <th>User Id</th>
                                        <th>Started Date</th>
                                        <th>End date</th>
                                        <th>Reason</th>
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
                                            foreach ($data as $row): ?>
                                    <tr>

                                            <td><?= $index += 1 ?></td>
                                                <td>
                                                    <h2>
                                                        <a><?=$row['UserId']?></a>
                                                    </h2>
                                                </td>
                                                    <td><?=$row['DateStart']?></td>
                                                    <td><?=$row['DateEnd']?></td>
                                                    <td><?=$row['Reason']?></td>
                                                    <!-- <td class="text-center"> -->

                                                                                                                <?php if ($permissions['EditPermission'] == 1) { ?>
                                          <td>
                                                           <form action="./edit-leave" method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?= $row['Id'] ?>">
                                                            <button type="submit" class="btn ml-2 btn-info btn-circle mb-2">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                         </form>
                                                        </td>
                                                    <?php } ?>
                                                    <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                    <td>
                                                        <button type="submit" class="btn ml-2 btn-primary btn-circle mb-2"
                                                            onclick="deleteLeave(<?= $row['Id'] ?>)">
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
    function deleteLeave(Id)
    {
        if(confirm("are you sure you want to delete this role"));
        $.ajax({
            url: "../../api/leaves/deleteLeave.php",
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