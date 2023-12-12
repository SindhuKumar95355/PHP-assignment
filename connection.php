<?php

$server = "localhost";
$name = "root";
$pass = "";
$db = "crud1";

$con = mysqli_connect($server, $name, $pass, $db);

if(!$con)
{
    die("somthing went worng : " . mysqli_error($con));
}
// else
// {
//     echo "connected successfully";
// }
?>