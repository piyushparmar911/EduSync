<?php 
require ("./includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$query = "
    SELECT event.*, users.Name AS UserName
    FROM event
    INNER JOIN users ON event.UserId = users.Id
";
$queryu= select("SELECT * from `users`");

$data = select($query);

$logginuser = isset($_SESSION['UserName'])? $_SESSION['UserName'] : "Admin";
?>        


        
         <div class="page-wrapper">
            <div class="content container-fluid">
               <div class="page-header">
                  <div class="row">
                     <div class="col-sm-12">
                        <h3 class="page-title">Welcome <?=htmlspecialchars($logginuser)?></h3>
                        <ul class="breadcrumb">
                           <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-one w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-user-graduate"></i>
                              </div>
                              <div class="db-info">
                                 <h3>500</h3>
                                 <h6>Users</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-two w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-crown"></i>
                              </div>
                              <div class="db-info">
                                 <h3>50+</h3>
                                 <h6>Awards</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-three w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-building"></i>
                              </div>
                              <div class="db-info">
                                 <h3>30+</h3>
                                 <h6>Department</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 d-flex">
                     <div class="card bg-four w-100">
                        <div class="card-body">
                           <div class="db-widgets d-flex justify-content-between align-items-center">
                              <div class="db-icon">
                                 <i class="fas fa-calendar-day"></i>
                              </div>
                              <div class="db-info">
                                 <h3>05</h3>
                                 <h6>Events</h6>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 col-lg-6">
                     <div class="card card-chart">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col-6">
                                 <h5 class="card-title">Events</h5>
                              </div>
                              <div class="col-6">
                                 <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item">
                                       <div class="form-group mb-0 amount-spent-select">
                                          <select class="form-control form-control-sm">
                                             <option>Today</option>
                                             <option>Last Week</option>
                                             <option>Last Month</option>
                                          </select>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <div id="apexcharts-area"></div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-lg-6">
                     <div class="card card-chart">
                        <div class="card-header">
                           <div class="row align-items-center">
                              <div class="col-6">
                                 <h5 class="card-title">Number of Users</h5>
                              </div>
                              <div class="col-6">
                                 <ul class="list-inline-group text-right mb-0 pl-0">
                                    <li class="list-inline-item">
                                       <div class="form-group mb-0 amount-spent-select">
                                          <select class="form-control form-control-sm">
                                             <option>Today</option>
                                             <option>Last Week</option>
                                             <option>Last Month</option>
                                          </select>
                                       </div>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                        <div class="card-body">
                           <div id="bar"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6 d-flex">
                     <div class="card flex-fill">
                        <div class="card-header">
                           <h5 class="card-title">Star Users</h5>
                        </div>
                        <div class="card-body">
                           <div class="table-responsive">
                           <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>RoleId</th>
                                        <th>ClassId</th>
                                        <th>Subject</th>
                                        <th>LastWork</th>
                                        <th>Experience</th>
                                        <th>Address</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($queryu as $row) {?>

                                        <tr>
                                            <td><?=$row['Id']?></td>
                                            <td><?=$row['Name']?></td>
                                            <td><?=$row['RoleId']?></td>
                                            <td><?=$row['ClassId']?></td>
                                        <td><?=$row['Subject']?></td>
                                        <td><?=$row['LastWork']?></td>
                                        <td><?=$row['Experience']?></td>
                                        <td><?=$row['Address']?></td>
                                    </tr>
                                    <?php }?>
                                    
                                </tbody>
                            </table>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 d-flex">
                     <div class="card flex-fill">
                        <div class="card-header">
                           <h5 class="card-title">Users Activity</h5>
                        </div>
                        <table class="table table-hover table-center mb-0 datatable">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>User Id(Head of event)</th>
                                        <th>Date</th>
                                        <th>Place</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($data as $row) {?>
                                            <td><?=$row['Id']?></td>
                                            <td>
                                                <h2>
                                                    <a><?=$row['Name']?></a>
                                                </h2>
                                            </td>
                                                <td><?=$row['UserName']?></td>
                                                    <td><?=$row['DateTime']?></td>
                                                    <td><?=$row['Place']?></td>
                                                    
                                                </tr>
                                                <?php } ?>
                                                
                                            </tbody>
                            </table>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill fb sm-box">
                        <i class="fab fa-facebook mb-2"></i>
                        <h6>50,095</h6>
                        <p>Likes</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill twitter sm-box">
                        <i class="fab fa-twitter mb-2"></i>
                        <h6>48,596</h6>
                        <p>Follows</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12">
                     <div class="card flex-fill insta sm-box">
                        <i class="fab fa-instagram mb-2"></i>
                        <h6>52,085</h6>
                        <p>Follows</p>
                     </div>
                  </div>
                  <div class="col-xl-3 col-sm-6 col-12 ">
                     <div class="card flex-fill linkedin sm-box">
                        <i class="fab fa-linkedin-in mb-2"></i>
                        <h6>69,050</h6>
                        <p>Follows</p>
                     </div>
                  </div>
               </div>
            </div>


           <?php
           include pathOf("includes/footer.php");
           include pathOf("includes/script.php");
           include pathOf("includes/pageend.php");           
           ?>
  