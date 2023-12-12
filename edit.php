
<?php

      // $successMessage = "";
      // $errorMessage = "";

      include "connection.php";
        
      if($_SERVER['REQUEST_METHOD'] =='POST')
      {
        $SL_NO = $_POST["id"];
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        $address = $_POST["address"];
        $mobile = $_POST["mobile"];

        echo $SL_NO . $name . $email . $pass . $address . $mobile;

        $query1 = "UPDATE `register` SET `SL_NO`='$SL_NO',`Name`='$name',`Email`='$email',`Password`='$pass',`Address`='$address',`Mobile`='$mobile' WHERE `register`.`SL_NO`='$SL_NO'";
        $result1 = mysqli_query($con,$query1);
        if(!$result1)
        {
          // $errorMessage = "Invalid query to update the data";
          echo "Somthing went wrong " . mysqli_error($con);
        }
        else
        {
          header("location: /pratice1/crud3/index.php?mesg=Updated successfully");
        }
      }
      ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP CRUD</a>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
              <a class="navbar-brand" href="/pratice1/crud3/index.php">Home</a>
              </li>
            </ul>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
          </div>
        </div>
      </nav>

      <div>
      <div class="container-sm">
        <div class="card col-md-6 offset-3 mt-3">
        <?php

include "connection.php";

        $id = $_GET['SL_NO'];
        $query = "SELECT * FROM `register` where `SL_NO`=$id";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);

        // echo $row['Address'];

        if(!$row)
        {
        //  $errorMessage = "Somting went wrong check the query";
        echo "Somthing went wrong " . mysqli_error($con);
        }
          
        ?>
<!--          
            <?php
            if($successMessage)
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong> $successMessage !</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";

               elseif($errorMessage)
               {
                echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage!</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
               }
            ?> -->
           
           
            <div class="card-header text-center">
                Enter the details to update
            </div>
            <div class="card-body">
            <form   method = "POST">
                <input type="hidden" name = "id" value="<?php echo $row['SL_NO'] ?>">
          <div class="mb-3">
            <label for="title" class="form-label">Enter Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" 
            value="<?php echo $row['Name'] ?>">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?php echo $row['Email']  ?>">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Password</label>
            <input type="text" class="form-control" id="pass" name="pass" aria-describedby="emailHelp" value="<?php echo $row['Password'] ?>">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp" value="<?php echo $row['Address'] ?>">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Mobile No</label>
            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp" value="<?php echo $row['Mobile']  ?>">
          </div>
          <button type="submit" class="btn btn-outline-primary">Update</button>
          <a href="/pratice1/crud3/index.php" class="btn btn-outline-danger">Cancel</a>
            </div>
        </div>
       
          <!-- <div class="mb-3">
            <label for="desc">Note Description</label>
            <textarea class="form-control" placeholder="Enter description" 
            id="desc" name="desc" rows="3"></textarea>
          </div> -->
          
          <!-- <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label> -->
        </form>
      </div>
      </div>