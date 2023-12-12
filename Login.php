<?php
    include "connection.php";

    $error = "";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $email = $_POST['email'];
        $pass = $_POST['password'];

        // echo $email . $pass;

        $query = "SELECT * FROM `register` where `register`.`Email`='$email' AND `register`.`Password`='$pass'";
        $result = mysqli_query($con,$query);
        $row = mysqli_num_rows($result);
       

        if($row == null)    
        {
            $error = "Failed to login due to invalid email or password";
        }
        else
        {
           header("location: /pratice1/crud3/index.php?mesg= Login Successful");
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PHP CRUD</a>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            </ul>
          </div>
        </div>
      </nav>


      <?php
            if(isset($_GET['mesg']))
            {
              $mesg = $_GET['mesg'];
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong> $mesg !</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }
            elseif($error)
            {
              echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
            <strong> $error !</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
            }
      ?>
      <div class="container-md">
       
        <div class="card col-md-6 offset-3 my-5">
            <div class="card-header">
            <h3 class="text text-center">Login using Email and Password</h3>
            </div>
      <div class="card-body">
            <form  action = "" method = "POST">
          <div class="mb-3">
            <label for="email" class="form-label">Enter Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Enter Password</label>
            <input type="text" class="form-control" id="pass" name="password" aria-describedby="emailHelp">
          </div>
          <button class="btn btn-outline-primary">Login</button>
          <h5 class="text text-center">click here to register <a href="/pratice1/crud3/add.php">Register</a></h5>
          </div>
        </div>
      </div>
     
</body>
</html>