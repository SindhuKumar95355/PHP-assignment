<?php      
              $server = "localhost";
              $name = "root";
              $pass = "";
              $db = "crud1";

              $con = mysqli_connect($server,$name,$pass,$db);

              if($con == null)
              {
                die("connection is failed due to :" . mysqli_connect_error($con));
              }
?>