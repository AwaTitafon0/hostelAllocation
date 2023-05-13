<?php

@include 'config.php';

session_start();
if(isset($_POST['submit'])){

   $mat = mysqli_real_escape_string($conn, $_POST['matricule']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM student_form WHERE matricule = '$mat' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

         $_SESSION['id'] = $row['id'];
          $_SESSION['user_name'] = $row['name'];
          $_SESSION['room'] = $row['room'];
         header('location: http://localhost/hostelAllocationManagement/student_page.php');
      }
     
   }else{
      $error[] = 'incorrect email or password!';
}

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

   <title>login form</title>

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
          <div class="carousel-item">
              <img src="css/room4.jpg" alt="room4" width="1100" height="500">
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
         <h3>login now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            };
         };
         ?>
         <input type="text" name="matricule" required placeholder="enter your matricule...">
         <input type="password" name="password" required placeholder="enter your password...">
         <input type="submit" name="submit" value="login now" class="form-btn">
         <p>don't have an account? <a href="register_form.php">register now</a></p>
      </form>
   </div>


</div>

</body>
</html>