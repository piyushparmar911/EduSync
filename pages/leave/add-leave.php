<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$UserId = $_SESSION['UserId'];
$permissions = authenticate('Leaves', $UserId);

$queryUser ="SELECT `Id`,`Name` FROM `users` ";

$resultUser = select($queryUser);
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Leave</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="leave-list.php">Leave</a></li>
                        <li class="breadcrumb-item active">Add Leave</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col-12">
                                    <h5 class="form-title"><span>Leave Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>User Id</label>
                                        <select id="UserId" class="form-control">
                                                <?php foreach ($resultUser as $user) : ?>
                                                    <option><?=$user['Id'] ?> - <?=$user['Name'] ?></option>
                                                    <?= $user['Id'] , $user['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Leave Start Date</label>
                                        <input type="date" id="DateStart" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Leave End Date</label>
                                        <input type="date" id="DateEnd" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Leave Reason</label>
                                        <input type="text" id="Reason" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" onclick="insertdata(event)">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<script>
    function insertdata(event) {
        event.preventDefault();
        
        let UserId = $('#UserId').val();
        let DateStart = $('#DateStart').val();
        let DateEnd = $('#DateEnd').val();
        let Reason = $('#Reason').val();



        $.ajax({
            url: '../../api/leaves/insertLeave.php',
            type: 'POST',
            data: {
                UserId: UserId,
                DateStart: DateStart,
                DateEnd: DateEnd,
                Reason: Reason
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Event not update successfully");
                else
                    alert("Event update successfully");
                    window.location.href = 'leave-list.php';
            }
        });
    }
</script>
<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>