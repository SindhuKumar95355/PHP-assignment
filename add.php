<?php
include "connection.php";

$successMessage = "";
$error = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST["name"];
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    $Address = $_POST["address"];
    $mobile = $_POST["mobile"];

  do{
    if(empty($name) || empty($email) || empty($pass) || empty($Address) || empty($mobile))
    {
        $error = "somthing went wrong or enter all the details";
        // echo "fill all fields " . mysqli_error($con);
        break;
    }
    
    else
    {
        $query = "INSERT INTO `register` ( `Name`, `Email`, `Password`, `Address`, `Mobile`) VALUES ( '$name', '$email', '$pass', '$Address', '$mobile')";

        $result = mysqli_query($con,$query);

        echo "inserted successgully";

        header("location: /pratice1/crud3/Login.php?mesg=New User Added successfully");
        exit;
    }
}
while(false);

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
            if($error)
                 echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                 <strong> $$error !</strong>
                 <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
               </div>";

              //  elseif($error)
              //  {
              //   echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
              //   <strong>$error!</strong>
              //   <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
              // </div>";
              //  }
            ?>
            <div class="card-header text-center">
                Enter the Details
            </div>
            <div class="card-body">
            <form  action = "" method = "POST">
          <div class="mb-3">
            <label for="title" class="form-label">Enter Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Password</label>
            <input type="text" class="form-control" id="pass" name="pass" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Address</label>
            <input type="text" class="form-control" id="address" name="address" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Enter Mobile No</label>
            <input type="text" class="form-control" id="mobile" name="mobile" aria-describedby="emailHelp">
          </div>
          <button type="submit" class="btn btn-outline-primary">Add</button>
          <a href="/pratice1/crud3/Login.php" class="btn btn-outline-danger">Cancel</a>
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
</body>
</html>