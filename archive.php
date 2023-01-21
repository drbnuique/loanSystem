<?php
session_start();
include("connection.php");
include("archive_search.php");
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
    $current_user = $_SESSION['user'];
    echo '<div id="sidebar">';
    echo '<div>';
    echo '<a>Hello ' . $current_user . ' </a>';
    echo '<a href="borrower_list.php">Borrowers</a>';
    echo '<a href="loan_list.php">Loans</a>';
    echo '<a href="account_list.php">Accounts</a>';
    echo '<a href="archive.php"  class=active>Archive</a>';
    echo '<a href="logout.php">Logout</a>';
    echo '</div>';
    echo '</div>';
    ?>
    <div class="header">
        <h1>LEGIT LENDING SYSTEM</h1>
    </div>
    <?php
    echo '<table class="borrower">
    <thead>
    <tr>

       <div class="search_bar">
         <form action="" method="post">
            <input type="search" id="search" name="valueToSearch" placeholder="search by ID">
            <input type="submit" id="search" name="archive_search" value="search">
        </form>
            </div>
 </tr>
    <tr>
        <td>
            <font face="Arial">ID</font>
        </td>
        <td>
            <font face="Arial">Loan ID</font>
        </td>
        <td>
            <font face="Arial">Borrower ID</font>
        </td>
        <td>
            <font face="Arial">Loan Amount</font>
        </td>
        <td>
            <font face="Arial">Loan Interest</font>
        </td>
        <td>
            <font face="Arial">Total Amount</font>
        </td>
        <td>
            <font face="Arial">Loan Duration</font>
        </td>
    </tr> </thead>';

    $query = mysqli_query($conn, $sql);
    if ($result = $query) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["id"];
            $field2name = $row["loan_id"];
            $field3name = $row["borrower_id"];
            $field4name = $row["loan_amount"];
            $field5name = $row["loan_interest"];
            $field6name = $row["loan_total_amount"];
            $field7name = $row["loan_duration"];
            echo '<tr> 
                      <td>' . $field1name . '</td> 
                      <td>' . $field2name . '</td> 
                      <td>' . $field3name . '</td> 
                      <td>' . $field4name . '</td> 
                      <td>' . $field5name . '</td> 
                      <td>' . $field6name . '</td> 
                      <td>' . $field7name . '</td> 
                  </tr>';
        }
    }
    echo '</table>';
    ?>
</body>

</html>