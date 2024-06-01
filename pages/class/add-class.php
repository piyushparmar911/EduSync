<?php
require("../../includes/init.php");

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Class', $UserId);
if ($permissions['AddPermission'] != 1)
    header('Location: ./index');

include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Class</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="class-list.php">Class</a></li>
                        <li class="breadcrumb-item active">Add Class</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="form-title"><span>Class Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Class Name</label>
                                    <input type="text" id="Name" class="form-control">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Boys</label>
                                    <input type="number" id="Boys" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Girls</label>
                                    <input type="number" id="Girls" class="form-control">
                                </div>
                            </div>

                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Total student</label>
                                    <input type="number" id="TotalStudent" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <button type="submit" onclick="insert()" class="btn btn-primary">Submit</button>
                            </div>
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
          <span aria-hidden="true">&times;</span>
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
        <h5 class="modal-title" id="successModalLabel"><h5 class="text-success">Success</h5></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Class added successfully!
      </div>
    </div>
  </div>
</div>

<script>
    function insert() {
    let Name = $('#Name').val();
    let Boys = $('#Boys').val();
    let Girls = $('#Girls').val();
    let TotalStudent = $('#TotalStudent').val();

    
    if (!Name.trim() || !Boys.trim() || !Girls.trim() || !TotalStudent.trim()) {
        $('#errorModal').modal('show');
        setTimeout(function() {
            $('#errorModal').modal('hide');
        }, 1500);
        return;
    }

    $.ajax({
        url: '../../api/class/insertClass.php',
        type: 'POST',
        data: {
            Name: Name,
            Boys: Boys,
            Girls: Girls,
            TotalStudent: TotalStudent
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
    window.location.href = 'class-list.php';
}

</script>



<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>