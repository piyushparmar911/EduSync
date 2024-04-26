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
<h3 class="page-title">Add Leave</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="leave-list.php">Leave</a></li>
<li class="breadcrumb-item active">Add Leave</li>
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
<h5 class="form-title"><span>Leave Details</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Leave ID</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>User Name</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
    <div class="form-group">
        <label>Leave Start Date</label>
        <input type="date" class="form-control">
    </div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Leave End Date</label>
<input type="date" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Leave Reason</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12">
<button type="submit" class="btn btn-primary">Submit</button>
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


<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php"); 
include pathOf("./includes/script.php");
?>