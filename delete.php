<?php

include "connection.php";

$id = $_GET['SL_NO'];

$query = "DELETE FROM `register` where `register`.`SL_NO`=$id";
$result = mysqli_query($con, $query);

if($result)
{
    // header("location : /pratice1/crud3/index.php?msg=Record deleted successfully");
    header("location: /pratice1/crud3/index.php?mesg= deleted successfully");
}
else
{
    echo "Failed to delete :". mysqli_error($con);
    
}

?>