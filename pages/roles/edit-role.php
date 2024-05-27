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
<script>
    function updatedata(event) {
        event.preventDefault();

        let Id = $('#Id').val();
        let Name = $('#Name').val();

        if (!Name.trim()) {
            alert("Please enter module name first.");
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
                if (!response)
                    alert("Role not updated");

                else
                    alert("Role updated successfully");
                window.location.href = 'roles-list.php';
            }
        });
    }
</script>
<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>