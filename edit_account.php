<?php

include("connection.php");
$ID = $_POST['ID'];
$username = $_POST['username2'];
$password = $_POST['password2'];
$first_name = $_POST['first_name2'];
$last_name = $_POST['last_name2'];


if (isset($_POST['edit_button'])) {
    //action for update here
    $sql = "UPDATE accounts
    SET username= '$username', pass= '$password', first_name = '$first_name', last_name = '$last_name'  
    WHERE ID = $ID";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo "<script>alert('Account Records Updated')</script>";
        echo '<script>
        window.location.replace("account_list.php");
        </script>';
    } else
        echo "<script>alert('account Records Didnt Update Properly')</script>";
    echo '<script>
    window.location.replace("account_list.php");
   </script>';
} else if (isset($_POST['delete_button'])) {
    $sql = "DELETE FROM accounts WHERE ID='$ID'";
    $rs = mysqli_query($conn, $sql);
    if ($rs) {
        echo "<script>alert('Account Records Deleted')</script>";
        echo '<script>
    window.location.replace("account_list.php");
   </script>';
    } else
        echo "<script>alert('account Records Didnt Delete Properly')</script>";
    echo '<script>
    window.location.replace("account_list.php");
   </script>';
} else {
    echo "<script>alert('error, something went wrong please try again')</script>";
    echo '<script>
    window.location.replace("account_list.php");
   </script>';
}
