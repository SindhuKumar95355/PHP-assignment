 
   <?php

   $mesg="";

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
             
          </div>
        </div>
      </nav>
      <?php
          if($mesg){
          echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
          <strong> $mesg !</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>";
          }
      ?>
      <div class="container-fluid">
      <h4 class="text text-center mt-3" >List of Users</h4>
      <a href="/pratice1/crud3/add.php" class="btn btn-primary btn-md mb-2" >Add</a>

      <table class="table table-bordered text-center">
        <thead>
          <tr>
            <th>SL_NO</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Address</th>
            <th>Mobile_No</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
              
             include "connection.php";

              $query = "SELECT * FROM `register`";

              $result = mysqli_query($con, $query);

              if($result == null)
              {
                die("query not executed :" . mysqli_error());
              }
              $row = 1;
              while($list = mysqli_fetch_assoc($result))
              {
                echo "<tr>
                <td> $row</td>
                <td> $list[Name]</td>
                <td>$list[Email]</td>
                <td>$list[Password]</td>
                <td>$list[Address]</td>
                <td>$list[Mobile]</td>
                <td> <a href='/pratice1/crud3/edit.php?SL_NO=$list[SL_NO]' class='btn btn-sm btn-primary'>Edit</a>
                     <a href='/pratice1/crud3/delete.php?SL_NO=$list[SL_NO]' class='btn btn-sm btn-danger'>Delete</a>
                </td>
              </tr>";
              $row++;
              }
          ?>
         
        </tbody>
      </table>
    </div>
</body>
</html>

