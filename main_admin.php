<?php
session_start();
include("connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>loan system</title>

</head>
<link rel="stylesheet" href="css/design.css">
<script src="script/script.js"></script>

<body>
    <?php
    $current_user = $_SESSION['user'];
    echo '<div id="sidebar">';
    echo '<div>';
    echo '<a>Hello ' . $current_user . ' </a>';
    echo '<a href="borrower_list.php">Borrowers</a>';
    echo '<a href="loan_list.php">Loans</a>';
    echo '<a href="account_list.php">Accounts</a>';
    echo '<a href="archive.php">Archive</a>';
    echo '<a href="logout.php">Logout</a>';
    echo '</div>';
    echo '</div>';
    ?>
    <div class="header">
        <h1>LEGIT LENDING SYSTEM</h1>
    </div>
</body>


</html>