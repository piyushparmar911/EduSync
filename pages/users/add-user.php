<?php
require("../../includes/init.php");

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Users', $UserId);
if ($permissions['AddPermission'] != 1)
    header('Location: ./index');


$queryrole = "SELECT `Id`, `Name` FROM `roles`";
$queryclass ="SELECT `Id`, `Name` FROM `class`";
$querySubject ="SELECT `Id`, `Name` FROM `subjects`";
$resultSubject = select($querySubject);
$resultrole = select($queryrole);
$resultclass = select($queryclass);
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>
<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user.php">Users</a></li>
                        <li class="breadcrumb-item active">Add Users</li>
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
                                        <h5 class="form-title"><span>Basic Details</span></h5>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group ">
                                            <label>Role ID<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <select id="RoleId" class="form-control">
                                                <?php foreach ($resultrole as $role) : ?>
                                                    <option><?=$role['Id'] ?> - <?=$role['Name'] ?></option>
                                                    <?= $role['Id'] , $role['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Name<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <input type="text"  class="form-control" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Class Id<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <select id="ClassId" class="form-control">
                                                <?php foreach ($resultclass as $class) : ?>
                                                    <option><?=$class['Id'] ?> - <?=$class['Name'] ?></option>
                                                    <?= $class['Id'] , $class['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                            <label>Subject<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            
                                            <select id="Subject" class="form-control">
                                                <?php foreach ($resultSubject as $subject) : ?>
                                                    <option><?=$subject['Id'] ?> - <?=$subject['Name'] ?></option>
                                                    <?= $subject['Id'] , $subject['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Address<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <input type="text" class="form-control" id="Address">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Password<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <input type="text" class="form-control" id="Password">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Experience</label>
                                            <input class="form-control" type="number" id="Experience">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Experience Gain</label>
                                            <input class="form-control" type="number" id="ExperienceGain">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>LastDegree<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <input type="text" class="form-control" id="LastDegree">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>LastWork</label>
                                            <input type="text" class="form-control" id="LastWork">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Salary<i class="fa fa-asterisk fa-sm text-danger pl-2"></i></label>
                                            <input type="number" class="form-control" id="Salary">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="button" class="btn btn-primary" onclick="updatedata(event)">Submit</button>
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
        User added successfully!
      </div>
    </div>
  </div>
</div>

<script>
        function updatedata(event) {
            event.preventDefault();

            let RoleId = $('#RoleId').val(); 
            let Name = $('#Name').val();
            let ClassId = $('#ClassId').val(); 
            let Subject = $('#Subject').val(); 
            let Address = $('#Address').val(); 
            let Password = $('#Password').val(); 
            let Experience = $('#Experience').val(); 
            let ExperienceGain = $('#ExperienceGain').val(); 
            let LastDegree = $('#LastDegree').val(); 
            let LastWork = $('#LastWork').val(); 
            let Salary = $('#Salary').val(); 


      if (!Name.trim() || !RoleId.trim() || !ClassId.trim() || !Subject.trim() || !Address.trim() || !Password.trim() || !LastDegree.trim() ||  !Salary.trim()){
        $('#errorModal').modal('show');
        setTimeout(function() {
            $('#errorModal').modal('hide');
        }, 1500);
        return;
    }

            $.ajax({
                url: '../../api/users/insertUser.php',
                type: 'POST',
                data: {
                    RoleId: RoleId,
                    Name: Name,
                    ClassId: ClassId,
                    Subject: Subject,
                    Address: Address,
                    Password: Password,
                    Experience: Experience,
                    ExperienceGain: ExperienceGain,
                    LastDegree: LastDegree, 
                    LastWork: LastWork,
                    Salary: Salary
                    
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
    window.location.href = 'user-list.php';
    }
    </script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>