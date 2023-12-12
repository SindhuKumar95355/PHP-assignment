
<?php

include "connection.php";

$mesg  = "";
if(isset($_GET['mesg']))
{
$mesg = $_GET['mesg'];
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
<?php
if($mesg)
{
echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>$mesg</strong>
<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
}
?>
<div class="container-md">
<table class="table table-bordered mt-5">
  <thead>
    <tr>
      <th scope="col">SL_NO</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Date & Time</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <?php

    $query = "SELECT * FROM `table1`";
    $result = mysqli_query($con, $query);
    // if(!$result)
    // {
    //     echo "SOmthing wrong";
    // }
    $SL=1;
   while( $row = mysqli_fetch_assoc($result))

//    echo $row['sl_no'];
   {
  ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo $SL ?></th>
      <td><?php echo $row["Name"] ?></td>
      <td><?php echo $row['Email'] ?></td>
      <td><?php echo $row['Password'] ?></td>
      <td><?php echo $row['Date and Time'] ?></td>
      <td> <a href="/pratice1/crud4/edit.php?id=<?php echo $row['sl_no'] ?>" class="btn btn-sm btn-outline-primary">Edit</a> 
      <a href="/pratice1/crud4/delete.php?id=<?php echo $row['sl_no'] ?>" class="btn btn-sm btn-outline-danger">Delete</a>
      
    </td>
    </tr>
  </tbody>
  <?php
  $SL++;
   }
  ?>
</table>
</div>
</body>
</html>