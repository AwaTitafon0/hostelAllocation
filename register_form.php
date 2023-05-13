<?php

@include 'config.php';
global $conn;

if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $mat = mysqli_real_escape_string($conn, $_POST['matricule']);
    $pass = md5($_POST['password']);
    $c_pass = md5($_POST['c_password']);
    $gender = $_POST['gender'];

    $select = " SELECT * FROM student_form WHERE matricule = '$mat' && password = '$pass' ";

    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){

        $error[] = 'student already exist!';

    }else{

        if($pass != $c_pass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO student_form(name, matricule, password, gender) VALUES('$name','$mat','$pass','$gender')";
            mysqli_query($conn, $insert);
            header('location:login_form.php');
        }
    }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>register form</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>


<div class="form-container">

    <div id="demo" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="css/room1.jpeg" alt="room1" width="1100" height="500">
            </div>
            <div class="carousel-item">
                <img src="css/room2.jpg" alt="room2" width="1100" height="500">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>


    <div class="right">
        <form action="" method="post">
            <h3>Register now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="enter your name...">
            <input type="text" name="matricule" required placeholder="enter your matriclue...">
            <input type="password" name="password" required placeholder="enter your password...">
            <input type="password" name="c_password" required placeholder="confirm your password...">
            <select name="gender">
                <option value="female">Female</option>
                <option value="male">Male</option>
            </select>
            <input type="submit" name="submit" value="register now" class="form-btn">
            <p>already have an account? <a href="login_form.php">login now</a></p>
        </form>


    </div>

</body>
</html>