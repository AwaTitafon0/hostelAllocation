<?php

require_once 'config.php';
global $conn;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>None</title>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="tableStyle">
    <div class="container">
    <h2> List of Student</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Matricule</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Room</th>
            <th>Action</th>

        </tr>
        </thead>
    </div>
        <tbody>
        <?php

        $sql = "SELECT * FROM student_form";
        $result = $conn->query($sql);

        if(!$result){
            die("Invalid query:" .$conn->errror);
        }

        while ($row = $result->fetch_assoc()) {
            echo "
                <tr>
               <td>$row[matricule]</td>
               <td>$row[name]</td>
               <td>$row[gender]</td>
               <td>$row[room]</td>
                <td> 
<a class='edit-btn' href='http://localhost/hostelAllocationManagement/edit.php?id=$row[id]'>Edit</a>
<a href='delete.php?id=$row[id]' class='delete-btn'>Delete</a>
<?php echo '' . ?>
               </td>
           </tr>
                ";
        }
        ?>

        </tbody>
    </table>

</div>

</body>
</html>
