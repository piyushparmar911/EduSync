<?php
require("../../includes/init.php");
include  pathOf("./includes/header.php");
include pathof("./includes/sidebar.php");


$Id = $_POST['id'];
$query = "SELECT * FROM `event` WHERE `Id` = '$Id'";
$queryUser = "SELECT `Id`, `Name` FROM `users`";

$resultUser = select($queryUser);
$data = selectOne($query);
?>



<div class="page-wrapper">
    <div class="content container-fluid">

        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Edit Event</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="events.php">Event</a></li>
                        <li class="breadcrumb-item active">Edit Event</li>
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
                                    <h5 class="form-title"><span>Event Details</span></h5>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Event Id</label>
                                        <input type="number" readonly id="Id" class="form-control" value="<?=$data['Id']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Head of Event(UserId)</label>
                                        <select id="UserId" class="form-control">
                                                <?php foreach ($resultUser as $user) : ?>
                                                    <option><?=$user['Id'] ?> - <?=$user['Name'] ?></option>
                                                    <?= $user['Id'] , $user['Name'] ?>
                                                <?php endforeach; ?>
                                            </select>
                                    </div>
                                </div>
                                
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Event Name</label>
                                        <input type="text" id="Name" class="form-control" value="<?=$data['Name']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Event Start Date</label>
                                        <input type="date" id="DateTime" class="form-control" value="<?=$data['DateTime']?>">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group">
                                        <label>Place of Event</label>
                                        <input type="text" id="Place" class="form-control" value="<?=$data['Place']?>">
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
        
        let Id =  $('#Id').val();
        let UserId = $('#UserId').val();
        let Name = $('#Name').val();
        let DateTime = $('#DateTime').val();
        let Place = $('#Place').val();


        if (!Name.trim()) {
            alert("Please enter module name first.");
            return;
        }

        $.ajax({
            url: '../../api/events/updateEvent.php',
            type: 'POST',
            data: {
                Id: Id,
                UserId: UserId,
                Name: Name,
                DateTime: DateTime,
                Place: Place
            },
            success: function(response) {
                console.log(response);
                if (!response)
                    alert("Event not update successfully");
                else
                    alert("Event update successfully");
                    window.location.href = 'events.php';
            }
        });
    }
    </script>


<?php
include pathOf("./includes/footer.php");
include pathOf("./includes/pageend.php");
include pathOf("./includes/script.php");
?>