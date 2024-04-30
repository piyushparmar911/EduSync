<?php
require ("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$query = "SELECT * FROM `subjects`" ;

$data = select($query);
?>

         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row align-items-center">
                     <div class="col">
                        <h3 class="page-title">Subjects</h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                           <li class="breadcrumb-item active">Subjects</li>
                        </ul>
                     </div>
                     <div class="col-auto text-right float-right ml-auto">
                        <a href="add-subject.php" class="btn btn-primary"><i class="fas fa-plus"></i></a>
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
                                       <th>Name</th>
                                       <th>Class Id</th>
                                       <th>Modify</th>
                                       <th>Delete</th>
                                    </tr>
                                    
                                 </thead>
                                 <tbody>
                                       <?php foreach ($data as $row) {  ?>
                                       <tr>
                                          <td><?=$row['Id']?></td>
                                          <td>
                                             <h2>
                                                <a><?=$row['Name']?></a>
                                             </h2>
                                          </td>
                                          <td><?=$row['ClassId']?></td>
                                          <td class="text-left">
                                             <a href="edit-subject.php?id=<?=$row['Id']?>" class="btn btn-sm bg-success-light ml-2">
                                                <i class="fas fa-pen"></i>
                                                
                                             </a>
                                          </td>
                                          <td class="text-left">
                                             <a href="../../api/subjects/deleteSubject.php?id=<?=$row['Id']?>" onclick="return alert('Are you sure to delete this subject');" class="btn btn-sm bg-danger-light ml-2">
                                                <i class="fas fa-trash"></i>
                                             </a>
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