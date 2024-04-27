<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$query = "SELECT * FROM `modules`";

$data = select($query);
?>

<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title">Modules</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item active">Modules</li>
               </ul>
            </div>
            <div class="col-auto text-right float-right ml-auto">
               <a href="#" class="btn btn-outline-primary mr-2"><i class="fas fa-download"></i> Download</a>
               <a href="add-Module.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                              <th>Module Id</th>
                              <th>Module Name</th>
                              <th class="text-right">Action</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php foreach($data as $row){?>
                              <tr>
                                 <td><?=$row['Id']?></td>
                                 <td>
                                    <h2>
                                       <a><?=$row['Name']?></a>
                                    </h2>
                                 </td>
                                 <td class="text-right">
                                    <div class="actions">
                                       <a href="edit-Module.php?id=<?=$row['Id']?>" class="btn btn-sm bg-success-light mr-2">
                                          <i class="fas fa-pen"></i>
                                       </a>
                                       <a href="../../api/modules/deleteModules.php?id=<?=$row['Id']?>" onclick="return confirm('Are you sure you want to delete this module?');" class="btn btn-sm bg-danger-light">
                                          <i class="fas fa-trash"></i>
                                       </a>
                                    </div>
                                 </td>
                              </tr>
                              <?php }?>
                           
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