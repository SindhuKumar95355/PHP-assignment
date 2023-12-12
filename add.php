<?php

include "connection.php";

$EM = "";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    do
    {
    // echo $name. $email. $pass;
    if(empty($name) || empty($email) || empty($pass))
    {
        $EM = "invalid query or all fields are querired";
        break;
    }
    $query = "INSERT INTO `table1`(`Name`, `Email`, `Password`) VALUES ('$name','$email','$pass')";

    $result = mysqli_query($con, $query);

    if(!$result)
    {
        $errorMessage = "invalid query or all fields are querired";
    }
    else
    {
        header("location: /pratice1/crud4/index.php?mesg=data inserted successfully");
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
    <title>add</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/pratice1/crud4/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/pratice1/crud4/add.php">Add</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- <div class="container"> -->
<?php
if($EM)
{
echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
<strong>$EM</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
<!-- </div> -->
<div class="container-md my-5">
<div class="card col-md-4 offset-4">
    <div class="card-body">
<form method = "POST">
<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1"
    name="name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name = "email" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"
    name="pass">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
</body>
</html>