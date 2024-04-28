<?php
require ("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");
?>

<link rel="stylesheet" href="<?=urlOf("assets/plugins/datatables/datatables.min.css")?>">

<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header">
<div class="row align-items-center">
<div class="col">
<h3 class="page-title">Leaves</h3>
<ul class="breadcrumb">
<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
<li class="breadcrumb-item active">Leaves</li>
</ul>
</div>
<div class="col-auto text-right float-right ml-auto">
<a href="add-Leave.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-12">
<div class="card card-table">
<div class="card-body">
<div class="table-responsive">
<table class="table table-hover table-center mb-0 datatable">
<thead>
<tr>
<th>Sr No</th>
<th>User Name</th>
<th>Started Date</th>
<th>End date</th>
<th>Reason</th>
<th class="text-right">status</th>
</tr>
</thead>
<tbody>
<tr>
<td>PRE2209</td>
<td>
<h2>
<a>Computer Science Engg</a>
</h2>
</td>
<td>Aaliyah</td>
<td>1995</td>
<td>180</td>
<td class="text-right">
<div class="actions">
<a href="edit-Leave.php" class="btn btn-sm bg-success-light mr-2">
<i class="fas fa-check"></i>
</a>
<a href="#" class="btn btn-sm bg-danger-light">
<i class="fas fa-times"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>PRE2213</td>
<td>
<h2>
<a>Mechanical Engg</a>
</h2>
</td>
<td>Malynne</td>
<td>1999</td>
<td>240</td>
<td class="text-right">
<div class="actions">
<a href="edit-Leave.php" class="btn btn-sm bg-success-light mr-2">
<i class="fas fa-check"></i>
</a>
<a href="#" class="btn btn-sm bg-danger-light">
<i class="fas fa-times"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>PRE2143</td>
<td>
<h2>
<a>Electrical Engg</a>
</h2>
</td>
<td>Levell Scott</td>
<td>1994</td>
<td>163</td>
<td class="text-right">
<div class="actions">
<a href="edit-Leave.php" class="btn btn-sm bg-success-light mr-2">
<i class="fas fa-check"></i>
</a>
<a href="#" class="btn btn-sm bg-danger-light">
<i class="fas fa-times"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>PRE2431</td>
<td>
<h2>
<a>Civil Engg</a>
</h2>
</td>
<td>Minnie</td>
<td>2000</td>
<td>195</td>
<td class="text-right">
<div class="actions">
<a href="edit-Leave.php" class="btn btn-sm bg-success-light mr-2">
<i class="fas fa-check"></i>
</a>
<a href="#" class="btn btn-sm bg-danger-light">
<i class="fas fa-times"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>PRE1534</td>
<td>
<h2>
<a>MCA</a>
</h2>
</td>
<td>Lois A</td>
<td>1992</td>
<td>200</td>
<td class="text-right">
<div class="actions">
<a href="edit-Leave.php" class="btn btn-sm bg-success-light mr-2">
<i class="fas fa-check"></i>
</a>
<a href="#" class="btn btn-sm bg-danger-light">
<i class="fas fa-times"></i>
</a>
</div>
</td>
</tr>
<tr>
<td>PRE2153</td>
<td>
<h2>
<a>BCA</a>
</h2>
</td>
<td>Calvin</td>
<td>1992</td>
<td>152</td>
<td class="text-right">
<div class="actions">
<a href="edit-Leave.php" class="btn btn-sm bg-success-light mr-2">
<i class="fas fa-check"></i>
</a>
<a href="#" class="btn btn-sm bg-danger-light">
<i class="fas fa-times"></i>
</a>
</div>
</td>
</tr>
</tbody>
</table>
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