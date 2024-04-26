<?php
require ("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>


<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Add Class</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="class-list.php">Class</a></li>
<li class="breadcrumb-item active">Add Class</li>
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
<input type="text" hidden class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Class Name</label>
<input type="text" id="Name" class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Boys</label>
<input type="number" id="Boys" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Girls</label>
<input type="number" id="Girls" class="form-control">
</div>
</div>

<div class="col-12 col-sm-6">
<div class="form-group">
<label>Total student</label>
<input type="number" id="TotalStudent" class="form-control">
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
    function insert()
    {
        let Name= $('#Name').val();
        let Boys = $('#Boys').val();
        let Girls = $('#Girls').val();
        let TotalStudent = $('#TotalStudent').val();

        if (!Name.trim()) {
            alert("Please enter class name first.");
            return; 
        }

        $.ajax({
            url: '../../api/class/insertClass.php',
            type: 'POST',
            data: {
                Name: Name,
                Boys: Boys,
                Girls: Girls,
                TotalStudent: TotalStudent
            },
            success: function(response){
                console.log(response);
                
                if (!response)
                    alert("Class not inserted successfully");
                else
                    alert("Class inserted successfully");
            }
        });
    }
</script>



<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php"); 
include pathOf("./includes/script.php");
?>