<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$UserId = $_SESSION['UserId'];
$permissions = authenticate('Events', $UserId);
$query = "
    SELECT event.*, users.Name AS UserName
    FROM event 
    INNER JOIN users ON event.UserId = users.Id
";
$queryUser = "SELECT `Id`,`Name` FROM `users`";

$dataUser = select($queryUser); 
$index = 0;
$data = select($query); 
?>

<link rel="stylesheet" href="<?= urlOf("assets/plugins/datatables/datatables.min.css") ?>">

<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Events</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Events</li>
                    </ul>
                </div>

                
                <?php if ($permissions['AddPermission'] == 1) { ?>
                <div class="col-auto text-right float-right ml-auto">
                    <a href="add-event.php" class="btn btn-primary"><i class="fas fa-plus" accesskey="+"></i></a>
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
                                        <th>User Id(Head of event)</th>
                                        <th>Date</th>
                                        <th>Place</th>
                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                                <th>Modify</th>
                                            <?php } ?>
                                            <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                <th>Delete</th>
                                            <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php if ($permissions['ViewPermission'] == 1) {
                                            foreach ($data as $row): ?>
                                            <td><?=$index += 1?></td>
                                            <td>
                                                <h2>
                                                    <a><?=$row['Name']?></a>
                                                </h2>
                                            </td>
                                                <td><?=$row['UserName']?></td>
                                                    <td><?=$row['DateTime']?></td>
                                                    <td><?=$row['Place']?></td>
                                                    <!-- <td class="text-left"> -->

                                                        <?php if ($permissions['EditPermission'] == 1) { ?>
                                          <td>
                                                           <form action="./edit-event" method="post">
                                                            <input type="hidden" name="id"
                                                                value="<?= $row['Id'] ?>">
                                                            <button type="submit" class="btn ml-2 btn-info btn-circle mb-2">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                         </form>
                                                        </td>
                                                    <?php } ?>
                                                    
                                                    <td>
                                                        <?php if ($permissions['DeletePermission'] == 1) { ?>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteModal<?=$row['Id']?>">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                    <?php } ?>

                                          <!-- Modal -->
                                          <div class="modal fade" id="deleteModal<?= $row['Id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                             <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                   <div class="modal-header">
                                                      <h5 class="modal-title" id="modalTitle<?= $row['Id'] ?>">Confirmation</h5>
                                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                         <span aria-hidden="true">&times;</span>
                                                      </button>
                                                   </div>
                                                   <div class="modal-body">
                                                      Are you sure you want to delete this event?
                                                   </div>
                                                   <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                      <button type="button" class="btn btn-danger" onclick="deleteEvent(<?= $row['Id'] ?>)" autofocus>Delete</button>
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
    function deleteEvent(Id)
    {
        
        $.ajax({
            url: "../../api/events/deleteEvent.php",
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