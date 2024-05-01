<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");

$Id = $_POST['id'];
$query = "SELECT * FROM `subjects` WHERE `Id` = '$Id'";
$queryClass = "SELECT * FROM `Class` ";

$resultClass = select($queryClass);
$data = selectOne($query);

?>


<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Subject</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="subjects.html">Subject</a></li>
                        <li class="breadcrumb-item active">Edit Subject</li>
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
                                    <h5 class="form-title"><span>Subject Information</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject ID</label>
                                        <input type="text" id="Id" readonly class="form-control" value="<?=$data['Id']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject Name</label>
                                        <input type="text" autofocus class="form-control" id="Name" value="<?=$data['Name']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Class Id</label>
                                        <select id="ClassId" class="form-control">
                                                <?php foreach ($resultClass as $class) : ?>
                                                    <option><?=$class['Id'] ?> - <?=$class['Name'] ?></option>
                                                    <?= $class['Id'] , $class['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" onclick="updatedata(event)" class="btn btn-primary">Submit</button>
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
    function updatedata(event) {
        event.preventDefault();

        let Id = $('#Id').val();
        let Name = $('#Name').val();
        let ClassId = $('#ClassId').val();

        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/subjects/updateSubject.php',
            type: 'POST',
            data: {
                Id: Id,
                Name: Name,
                ClassId: ClassId
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("subject not updated");

                else
                    alert("subject updated successfully");
                window.location.href = 'subjects-list.php';
            }
        });
    }
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>