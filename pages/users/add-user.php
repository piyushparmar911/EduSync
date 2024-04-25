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
<h3 class="page-title">Add Users</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="user.php">Users</a></li>
<li class="breadcrumb-item active">Add Users</li>
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
<h5 class="form-title"><span>Basic Details</span></h5>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>user ID</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Role Id</label>
<input type="number" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Subject</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Address</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Password</label>
<input type="password" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Experience</label>
<input class="form-control" type="number">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Experience Gain</label>
<input class="form-control" type="number">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Last Degree</label>
<input type="text" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Last Work</label>
<input type="email" class="form-control">
</div>
</div>
<div class="col-12 col-sm-6">
<div class="form-group">
<label>Salary</label>
<input type="number" class="form-control">
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