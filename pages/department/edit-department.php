<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$Id = $_POST['id'];
$query = "SELECT * FROM `departments` WHERE `Id` = '$Id'";
$queryUser = "SELECT `Id`, `Name` FROM `users`";

$resultUser = select($queryUser);
$data = selectOne($query);

?>



<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="departments.html">Department</a></li>
                        <li class="breadcrumb-item active">Edit Department</li>
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
                                        <label>Department ID</label>
                                        <input type="text" class="form-control" readonly id="Id" value="<?=$data['Id']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Department Name</label>
                                        <input type="text" class="form-control" id="Name" value="<?=$data['Name']?>">
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
                                        <input type="date" class="form-control" id="StartedYear" value="<?=$data['StartedYear']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>No of Students</label>
                                        <input type="text" class="form-control" id="NoOfStudent" value="<?=$data['NoOfStudent']?>">
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
        
        let Id = $('#Id').val();
        let Name = $('#Name').val();
        let UserId = $('#UserId').val();
        let StartedYear = $('#StartedYear').val();
        let NoOfStudent = $('#NoOfStudent').val();


        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/departments/updateDepartment.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name,
                UserId: UserId,
                StartedYear: StartedYear,
                NoOfStudent: NoOfStudent
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Department not updated successfully");
                else
                    alert("Department updated successfully");
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