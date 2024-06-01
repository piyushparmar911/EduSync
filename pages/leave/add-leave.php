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
                                        <label>User Id<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
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
                                        <label>Leave Start Date<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                        <input type="date" id="DateStart" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Leave End Date<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                        <input type="date" id="DateEnd" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Leave Reason<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                        <input type="text" id="Reason" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-primary" onclick="insertdata(event)">Submit</button>
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

<!-- warning Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="errorModalLabel"><h4 class="text-danger">Warning</h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        Please fill the all fields.
      </div>
    </div>
  </div>
</div>
<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel"><h4 class="text-success">Success</h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        leave added successfully!
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

        if (!DateStart.trim() || !UserId.trim() || !DateEnd.trim() || !Reason.trim()) {
        $('#errorModal').modal('show');
        setTimeout(function() {
            $('#errorModal').modal('hide');
        }, 1500);
        return;
    }


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
                if (response.error) {
                    alert("Error: " + response.message); 
                } else {
                    $('#successModal').modal('show');
                    setTimeout(function() {
                        $('#successModal').modal('hide');
                        redirectToClassList(); 
                    }, 1500);
                }
            }
        });
    }

function redirectToClassList() {
    window.location.href = 'leave-list.php';
    }
</script>
<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>