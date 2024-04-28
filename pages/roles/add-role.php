<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$query = "SELECT * FROM  `modules`";
$data = select($query)
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Role</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="roles-list.php">Role</a></li>
                        <li class="breadcrumb-item active">Add Role</li>
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
                                        <label>Role Name</label>
                                        <input type="text" autofocus id="Name" class="form-control">
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
        let ModuleId = $('#ModuleId').val();

        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/roles/insertRoles.php',
            type: 'POST',
            data: {
                Name: Name,
                ModuleId: ModuleId
                
            },
            success: function(response) {
                console.log(response);
                if (!response) {
                    confirm("insert failed");
                } else {
                    alert("Added successfully");
                    window.location.href = "roles-list.php";
                }
            }
        });
    }
</script>


<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>