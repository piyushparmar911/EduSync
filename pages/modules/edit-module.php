<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$moduleId = $_GET['Id'];
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Modules</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="modules-list.php">Modules</a></li>
                        <li class="breadcrumb-item active">Edit Modules</li>
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
                                <h5 class="form-title"><span>Modules Information</span></h5>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Modules ID</label>
                                    <input type="number"  value="<?=$moduleId?>" id="Id" class="form-control">
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label>Modules Name</label>
                                    <input type="text" id="Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="button" onclick="updateData()" class="btn btn-primary" value="Update" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/script.php");
?>
<script>
    function updateData() {
        let Id = $('#Id').val();
        let Name = $('#Name').val();

        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/Modules/updateModules.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name
            },
            success: function(response) {
                console.log(response);
                if (response) {
                    alert("updated successfully");
                } else {
                    confirm("insert failed");
                }
            }
        });
    }
</script>

<?php
include pathOf("./includes/pageend.php");
?>