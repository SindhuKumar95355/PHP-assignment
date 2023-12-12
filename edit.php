<?php

include "connection.php";
$EM = "";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    do{
    if(empty($id) ||empty($name) || empty($email) || empty($pass))
    {
        $EM = "invalid query or all fields are querired";
        break;
    }

    $query2 = "UPDATE `table1` SET `Name`='$name', `Email`='$email', `Password`='$pass' WHERE `table1`.`sl_no`='$id'";
    // $query1 = "UPDATE `register` SET `SL_NO`='$SL_NO',`Name`='$name',`Email`='$email',`Password`='$pass',`Address`='$address',`Mobile`='$mobile' WHERE `register`.`SL_NO`='$SL_NO'";
    
    $result2 = mysqli_query($con, $query2);

    if(!$result2)
    {
        echo "somthing is wrong";
        break;
    }

    header("location: /pratice1/crud4/index.php?mesg=Data updated successfully");
}
while(false);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script
    src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
    crossorigin="anonymous"></script>
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

<?php

// include  "connection.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query1 = "SELECT * FROM `table1` WHERE `sl_no`=$id";
    $result1 = mysqli_query($con, $query1);

    if(!$result1)
    {
        echo "invalid query";
    }

    $row = mysqli_fetch_assoc($result1);
}
?>
<!-- </div> -->
<div class="container-md my-5">
<div class="card col-md-4 offset-4">

<div class="card-header text text-center">
    Edit the details
</div>
    <div class="card-body">
<form method = "POST">
<div class="mb-3">

    <input type="hidden" name="id" value="<?php echo $row['sl_no'] ?>">
    <label for="exampleInputPassword1" class="form-label"> Update Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1"
    name="name" value="<?php echo $row['Name'] ?>">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label"> Update Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1"  name = "email" 
    value="<?php echo $row['Email'] ?>" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Update Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1"
    name="pass" value="<?php echo $row['Password'] ?>">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>
    
</body>
</html>