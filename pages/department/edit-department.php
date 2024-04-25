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
<input type="text" class="form-control" value="PRE1534">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Department Name</label>
<input type="text" class="form-control" value="MCA">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>User Id (Hod)</label>
<input type="text" class="form-control" value="Lois A">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Department Start Date</label>
<input type="text" class="form-control" value="1992">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>No of Students</label>
<input type="text" class="form-control" value="200">
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