<?php
include "connection.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    // echo $id;
    $query = "DELETE FROM `table1` where `sl_no`=$id";
    $result = mysqli_query($con, $query);

    if(!$result)
    {
        echo "somthing went wrong";
    }

    header("location: /pratice1/crud4/index.php?mesg=Deleted successfully");
}

?>