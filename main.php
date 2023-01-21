<?php
session_start();
include("connection.php");
if (isset($_POST['login'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!isset($_SESSION)) {
            session_start();
        }
        // username and password sent from form 

        $myusername = mysqli_real_escape_string($conn, $_POST['username']);
        $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

        $sql = "SELECT ID FROM accounts WHERE username = '$myusername' AND pass = '$mypassword'";
        $sqlName = mysqli_query($conn, "SELECT first_name FROM accounts WHERE username = '$myusername' AND pass = '$mypassword'");
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        $error = "Your Login Name or Password is invalid";
        $count = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($sqlName)) {
            $name = $row['first_name'];
        }
        // If result matched $myusername and $mypassword, table row must be 1 row
        $mainAdmin = "mainAdmin.php";
        if ($count == 1) {
            $_SESSION['user'] = $name;
            echo "<script>alert('welcome to the system')</script>";
            echo '<script>
                 window.location.replace("main_admin.php");
                </script>';
        } else {
            echo "<script>alert('invalid account please try again ')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loan System</title>

</head>
<link rel="stylesheet" href="css/design.css">
<script src="script/script.js"></script>

<body>
    <?php
    // shows when your not logged in
    if (!isset($_SESSION['login_user'])) {

        echo '<div id="sidebar_2">';
        echo '<div id="sidebar_main_menu">';
        echo '<p>LEGIT LENDING SYSTEM</p>';
        echo '<form action="" method="post">';
        echo '<input type="text" name="username" id="username" placeholder="username">';
        echo '<input type="password" name="password" id="password" placeholder="password">';
        echo '<input type="submit" name="login" id="login" value="login">';
        echo '</form>';
        echo '</div>';
        echo '</div>';
    }
    ?>
    <img src="page_images/home_background.jpg" class="main_menu_image">

</body>

</html>