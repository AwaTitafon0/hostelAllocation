<?php
$servername="localhost";
$username="root";
$password ="";
$dbname = "pharmacy";

$connection =  new mysqli($servername,$username,$password,$dbname);





$DrugName="";
$Quantity_In_Stock ="";
$Expiry_Date="";
$Dose="";
$Drug_Form="";

$errorMessage="";
$successMessage="";
$result="";

if(isset($_POST['submit'])){
    $DrugName= $_POST['DrugName'];
    $Quantity_In_Stock = $_POST['Quantity_In_Stock'];
    $Expiry_Date=$_POST['Expiry_Date'];
    $Dose=$_POST['Dose'];
    $Drug_Form=$_POST['Drug_Form'];


        $sql = "INSERT INTO antibiotics(DrugName,Quantity_In_Stock,Expiry_Date,Dose,Drug_Form)".
               "VALUES ('$DrugName','$Quantity_In_Stock','$Expiry_Date','$Dose','$Drug_Form')";

        $result=mysqli_query($connection,$sql);

        if ($result){
            //echo "Data inserted successfully ";
            header('location:index.php');

        }else{
            die(mysqli_error($connection));






        $DrugName="";
        $Quantity_In_Stock ="";
        $Expiry_Date="";
        $Dose="";
        $Drug_Form="";

        $successMessage = "Drug successfully added";

        header("location:index.php");
        exit;

    }while(false);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Drugs</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Adding a new drug</h2>

        <?php
        if (!empty($errorMessage)){
            echo "
                   <div class='alert alert-warning  alert-dismissible fade show' role='alert'>
                   <strong>$errorMessage</strong>
                   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                   </div>
                   ";
        }
        ?>
        <form  method="post">
            <div class="row mb-3">
              <label class="col-sm-3 col-form-label">DrugName</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="DrugName" value="<?php echo $DrugName;  ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Quantity In Stock</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="Quantity_In_Stock" value="<?php echo $Quantity_In_Stock;  ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Expiry Date</label>
                <div class="col-sm-6">
                    <input type="date" class="form-control" name="Expiry_Date" value="<?php echo $Expiry_Date; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Dose</label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="Dose" value="<?php echo $Dose;  ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">DrugForm</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Drug_Form" value="<?php echo $Drug_Form;  ?>">
                </div>
            </div>


            <?php

            if (!empty($successMessage)){
                echo "
                   <div class='row mb-3'>
                     <div class='offset-sm-3 col-sm-6'>
                   <div class='alert alert-success  alert-dismissible fade show' role='alert'>
                   <strong>$successMessage</strong>
                   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                       </div>
                     </div>
                   </div>
                   ";
            }
            ?>
            <div class="row mb-3">
            <div class="offset-sm-3 col-sm-3 d grid">
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
                <div class="col-sm-3 d-grid">
                     <a class="btn btn-outline-primary" href="details.php" role="button"> Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
