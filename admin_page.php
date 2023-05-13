<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['id'])){

    header('location:adminLog.php');

    $select = " SELECT * FROM admin 'id'";

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
   <title>admin page</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>hi, <span>admin</span></h3>
      <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
      <p>this is an admin page</p>
      <a href="logoutAdmin.php" class="btn">logout</a>
       <a href="details.php" class="btn">update</a>
   </div>

</div>

</body>
</html>