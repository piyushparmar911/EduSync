<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$UserId = $_SESSION['UserId'];
$permissions = authenticate('Subject', $UserId);
$Id = $_POST['id'];
$query = "SELECT * FROM `subjects` WHERE `Id` = '$Id'";
$queryClass = "SELECT * FROM `Class` ";

$resultClass = select($queryClass);
$data = selectOne($query);

?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Subject</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="subjects.html">Subject</a></li>
                        <li class="breadcrumb-item active">Edit Subject</li>
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
                                    <h5 class="form-title"><span>Subject Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject ID</label>
                                        <input type="text" id="Id" readonly class="form-control" value="<?=$data['Id']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject Name<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                        <input type="text" autofocus class="form-control" id="Name" value="<?=$data['Name']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Class Id<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                        <select id="ClassId" class="form-control">
                                                <?php foreach ($resultClass as $class) : ?>
                                                    <option><?=$class['Id'] ?> - <?=$class['Name'] ?></option>
                                                    <?= $class['Id'] , $class['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
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
        <h5 class="modal-title" id="successModalLabel"><h4 class="text-success">Success</h4></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          
        </button>
      </div>
      <div class="modal-body">
        subject updated successfully!
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
<script>
    function updatedata(event) {
        event.preventDefault();

        let Id = $('#Id').val();
        let Name = $('#Name').val();
        let ClassId = $('#ClassId').val();

        if (!Name.trim()) {
        $('#errorModal').modal('show');
        setTimeout(function() {
            $('#errorModal').modal('hide');
        }, 1500);
        return;
    }
        $.ajax({
            url: '../../api/subjects/updateSubject.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name,
                ClassId: ClassId
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
    window.location.href = 'subjects-list.php';
    }
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>