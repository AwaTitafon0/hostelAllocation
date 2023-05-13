<?php

require_once 'config.php';
global $conn;
       $id=$_GET['id'];
       $query=mysqli_query($conn,"select * from student_form where id=$id");
        while($row=mysqli_fetch_array($query)){
            $Matricule=$row['matricule'];
            $Name = $row['name'];
            $Gender = $row['gender'];
            $Room = $row['room'];
        }

if (isset($_POST['submit'])) {
    $query = mysqli_query($conn, "update  student_form set Matricule='$_POST[matricule]',Name='$_POST[name]',Room='$_POST[room]',Gender='$_POST[gender]'");
    header("location:details.php");
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel</title>
    <link rel="stylesheet" href="css/style.css">
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">-->
</head>
<body>
<div class="container" style="display: inline-block;">
    <h2>Update Student</h2>
    <form action="" method="post" class="table" >

            <label class="col-sm-3 col-form-label">Matricule</label>
                <input type="text" name="matricule" value="<?php echo $Matricule;  ?>"><br><br>

            <label class="col-sm-3 col-form-label">Name</label>
                <input type="text" name="name" value="<?php echo $Name;  ?>"><br><br>

            <label class="col-sm-3 col-form-label">Gender</label>
                <input type="text" name="gender" value="<?php echo $Gender; ?>"><br><br>

            <label class="col-sm-3 col-form-label">Room</label>
                <input type="number" name="room" value="<?php echo $Room;  ?>"><br><br>

                <button class='edit-btn' type="submit" class="btn btn-primary" name="submit">edit</button>

    </form>
</div>
</body>
</html>
