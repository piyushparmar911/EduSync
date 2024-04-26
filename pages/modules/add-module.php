<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Module</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="modules-list.php">Module</a></li>
                        <li class="breadcrumb-item active">Add Module</li>
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
                                    <h5 class="form-title"><span>Module Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Module Name</label>
                                        <input type="text" id="Name" class="form-control" autofocus>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" onclick="insert()" class="btn btn-primary">Submit</button>
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
    function insert() {
        let Name = $('#Name').val();

        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/modules/insertModules.php',
            type: 'POST',
            data: {
                Name: Name
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Module not inserted successfully");
                else
                    alert("Module inserted successfully");
            }
        });
    }
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>