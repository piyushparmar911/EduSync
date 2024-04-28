<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$queryrole = "SELECT `Id`, `Name` FROM `roles`";
    $queryclass ="SELECT `Id`, `Name` FROM `class`";
    $querySubject ="SELECT `Id`, `Name` FROM `subjects`";

    $resultSubject = select($querySubject);
    $resultrole = select($queryrole);
    $resultclass = select($queryclass);
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
                                            <label>Role ID</label>
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
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="Name">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Class Id</label>
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
                                            <label>Subject</label>
                                            
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
                                            <label>Address</label>
                                            <input type="text" class="form-control" id="Address">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label>Password</label>
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
                                            <label>LastDegree</label>
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
                                            <label>Salary</label>
                                            <input type="number" class="form-control" id="Salary">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" onclick="updatedata(event)">Submit</button>
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

            if (!Name.trim()) {
                alert("Please enter module name first.");
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
                    if (!response)
                        alert("Role not updated");

                    else
                        alert("user updated successfully");
                    window.location.href = 'user.php';
                }
            });
        }
    </script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>