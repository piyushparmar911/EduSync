<?php
require("../../includes/init.php");
include pathOf("./includes/header.php");
include pathOf("./includes/sidebar.php");

    $Id = $_GET['id'];
    $query = "SELECT * FROM `modules` WHERE `Id`= '$Id'";
    
$data = selectOne($query);    
    ?>

<div class="page-wrapper">
   <div class="content container-fluid">
      <div class="page-header">
         <div class="row align-items-center">
            <div class="col">
               <h3 class="page-title">Edit Module</h3>
               <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="module-list.php">Modules</a></li>
                  <li class="breadcrumb-item active">Edit Module</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-sm-12">
            <div class="card">
               <div class="card-body">
                  <form>
                      <div class="col-12 col-sm-6">
                          <div class="form-group">
                            <label for="moduleName">Module Id</label>
                            <input type="text" readonly class="form-control" id="Id" name="moduleId" value="<?=$data['Id'] ?>">
                        </div>
                     </div>
                     <div class="col-12 col-sm-6">
                        <div class="form-group">
                            <label for="moduleName">Module Name</label>
                            <input type="text" class="form-control" id="Name" value="<?=$data['Name']?>" name="moduleName">
                            
                        </div>
                        </div>

                        <div class="col-12">
                                    <button type="submit" onclick="updatedata(event)" class="btn btn-primary">Update</button>
                                </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
    function updatedata(event) {
      event.preventDefault();
      
        let Id = $('#Id').val();
        let Name = $('#Name').val();

        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/modules/updateModules.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Module not inserted successfully");
                    
                    else
                    alert("Module inserted successfully");
                    window.location.href = 'modules-list.php';
            }
        });
    }
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>
