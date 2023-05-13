<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['id'])){

    header('location:login_form.php');

    $select = " SELECT * FROM student_form 'id'";

    $result = mysqli_query($conn, $select);
    $row = mysqli_fetch_array($result);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>student</span></h3>
      <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <a href="logout.php" class="btn">logout</a>
       <a href="#" class="btn">Room : <?php echo $_SESSION['room'] ?></a>
   </div>

</div>

</body>
</html>