<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Department', $UserId);


$Id = $_POST['id'];
$query = "SELECT * FROM `roles` WHERE `Id` = '$Id'";

$data = selectOne($query);
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Role</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="roles-list.php">Role</a></li>
                        <li class="breadcrumb-item active">Edit Role</li>
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
                                    <h5 class="form-title"><span>Role Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Role ID</label>
                                        <input type="number" readonly id="Id" class="form-control" value="<?= $data['Id'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Role Name</label>
                                        <input type="text" autofocus id="Name" class="form-control" value="<?= $data['Name'] ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" onclick="updatedata(event)" class="btn btn-primary">Submit</button>
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
<!-- Sucess modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        role updated successfully!
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
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Please fill the all fields.
      </div>
    </div>
  </div>
</div>

<script>
    function updatedata(event) {
        event.preventDefault();

        let Id = $('#Id').val();
        let Name = $('#Name').val();

        
        if (!Name.trim()) {
        $('#errorModal').modal('show');
        setTimeout(function() {
            $('#errorModal').modal('hide');
        }, 1500);
        return;
    }

        $.ajax({
            url: '../../api/roles/updateRoles.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name
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
    window.location.href = 'roles-list.php';
    }
    </script>
<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>