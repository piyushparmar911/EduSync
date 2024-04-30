<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$queryUser = "SELECT  `Id`,`Name` FROM `users`" ;

$resultUser = select($queryUser);
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="departments.html">Department</a></li>
                        <li class="breadcrumb-item active">Add Department</li>
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
                                    <h5 class="form-title"><span>Department Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <input type="text" autofocus id="Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>User Id (Hod)</label>
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
                                        <label>Department Start Date</label>
                                        <input type="date" id="StartedYear" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>No of Students</label>
                                        <input type="text" id="NoOfStudent" class="form-control">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" onclick="insertdata()" class="btn btn-primary">Submit</button>
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
    function insertdata() {
        let Name = $('#Name').val();
        let UserId = $('#UserId').val();
        let StartedYear = $('#StartedYear').val();
        let NoOfStudent = $('#NoOfStudent').val();


        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/departments/insertDepartment.php',
            type: 'POST',
            data: {
                Name: Name,
                UserId: UserId,
                StartedYear: StartedYear,
                NoOfStudent: NoOfStudent
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Department not inserted successfully");
                else
                    alert("Department inserted successfully");
                    window.location.href = 'departments-list.php';
            }
        });
    }
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>