<?php
require("../../includes/init.php");
include pathOf("./includes/header.php");
include pathOf("./includes/sidebar.php");

session_start(); // Ensure the session is started

$UserId = $_SESSION['UserId'];
$permissions = authenticate('Users', $UserId);
$Id = $_POST['Id'];

$query = "SELECT * FROM `users` WHERE `Id` = '$Id'";
$queryrole = "SELECT `Id`, `Name` FROM `roles`";
$queryclass = "SELECT `Id`, `Name` FROM `class`";
$querySubject = "SELECT `Id`, `Name` FROM `subjects`";

$resultSubject = select($querySubject);
$resultrole = select($queryrole);
$resultclass = select($queryclass);
$data = selectOne($query);

?>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Users</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="user.php">Users</a></li>
                        <li class="breadcrumb-item active">Edit Users</li>
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
                                        <label>User ID</label>
                                        <input type="number" class="form-control" name="id" id="Id" readonly value="<?= $data['Id'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Role ID</label>
                                        <select id="RoleId" class="form-control">
                                            <?php foreach ($resultrole as $role) : ?>
                                                <option value="<?= $role['Id'] ?>"><?= $role['Id'] ?> - <?= $role['Name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="Name" value="<?= $data['Name'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Class ID</label>
                                        <select id="ClassId" class="form-control">
                                            <?php foreach ($resultclass as $class) : ?>
                                                <option value="<?= $class['Id'] ?>"><?= $class['Id'] ?> - <?= $class['Name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <select id="Subject" class="form-control">
                                            <?php foreach ($resultSubject as $subject) : ?>
                                                <option value="<?= $subject['Id'] ?>"><?= $subject['Id'] ?> - <?= $subject['Name'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" id="Address" value="<?= $data['Address'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="text" class="form-control" id="Password" value="<?= $data['Password'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Experience</label>
                                        <input class="form-control" type="number" id="Experience" value="<?= $data['Experience'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Experience Gain</label>
                                        <input class="form-control" type="number" id="ExperienceGain" value="<?= $data['ExperienceGain'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Last Degree</label>
                                        <input type="text" class="form-control" id="LastDegree" value="<?= $data['LastDegree'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Last Work</label>
                                        <input type="text" class="form-control" id="LastWork" value="<?= $data['LastWork'] ?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Salary</label>
                                        <input type="number" class="form-control" id="Salary" value="<?= $data['Salary'] ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" onclick="updatedata(event)">Submit</button>
                                </div>
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
    let RoleId = $('#RoleId').val(); 
    let Name = $('#Name').val();
    let ClassId = $('#ClassId').val(); 
    let Subject = $('#Subject').val(); 
    let Address = $('#Address').val(); 
    let Password = $('#Password').val(); 
    let Experience = $('#Experience').val(); 
    let ExperienceGain = $('#ExperienceGain').val(); 
    let LastDegree = $('#LastDegree').val(); 
    let LastWork = $('#LastWork').val(); 
    let Salary = $('#Salary').val(); 

    if (!Name.trim()) {
        alert("Please enter the name first.");
        return;
    }

    $.ajax({
        url: '../../api/users/updateUser.php',
        type: 'POST',
        data: {
            Id: Id,
            RoleId: RoleId,
            Name: Name,
            ClassId: ClassId,
            Subject: Subject,
            Address: Address,
            Password: Password,
            Experience: Experience,
            ExperienceGain: ExperienceGain,
            LastDegree: LastDegree, 
            LastWork: LastWork,
            Salary: Salary
        },
        success: function(response) {
            console.log(response);
            if (!response)
                alert("User not updated");
            else
                alert("User updated successfully");
                window.location.href = 'user-list.php';
        }
    });
}
</script>

<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>
