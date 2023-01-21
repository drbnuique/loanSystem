<?php

include("connection.php");

$username = $_POST['username'];
$password = $_POST['password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

// database insert SQL code
$sql = "INSERT INTO accounts (username, pass, first_name, last_name)
 VALUES ( '$username', '$password ', '$first_name', '$last_name')";

// insert in database
$rs = mysqli_query($conn, $sql);

if($rs)
{
    echo "<script>alert('Account Records Inserted')</script>";
    echo '<script>
    window.location.replace("account_list.php");
   </script>';
}
else
    echo "<script>alert('account Records Didnt Inserted Properly')</script>";
    echo '<script>
    window.location.replace("account_list.php");
   </script>';
