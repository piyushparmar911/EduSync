<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$Id = $_GET['id'];
$query = "SELECT * FROM `class` WHERE `Id` = '$Id'";

$data = selectOne($query);
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Class</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="class-list.php">Class</a></li>
                        <li class="breadcrumb-item active">Edit Class</li>
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
                                    <h5 class="form-title"><span>Class Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Class ID</label>
                                        <input type="text" readonly class="form-control" id="Id" value="<?=$data['Id']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Class Name</label>
                                        <input type="text" class="form-control" id="Name" autofocus value="<?=$data['Name']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Boys</label>
                                        <input type="number" class="form-control" id="Boys" value="<?=$data['Boys']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Girls</label>
                                        <input type="number" class="form-control" id="Girls" value="<?=$data['Girls']?>">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Total student</label>
                                        <input type="number" class="form-control" id="TotalStudents" value="<?=$data['TotalStudents']?>">
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" onclick="updatedata(event)">Update</button>
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
        let Boys = $('#Boys').val();
        let Girls = $('#Girls').val();
        let TotalStudents = $('#TotalStudents').val();

        

        $.ajax({
            url: '../../api/class/updateClass.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name,
                Boys: Boys,
                Girls: Girls,
                TotalStudents: TotalStudents
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Role not updated");

                else
                    alert("class updated successfully");
                window.location.href = 'class-list.php';
            }
        });
    }
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>