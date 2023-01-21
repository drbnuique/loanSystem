<?php
session_start();
include("connection.php");
include("borrower_search.php");
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
    echo '<a href="account_list.php"  class=active>Accounts</a>';
    echo '<a href="archive.php">Archive</a>';
    echo '<a href="logout.php">Logout</a>';
    echo '</div>';
    echo '</div>';
    ?>
    <div class="header">
        <h1>LEGIT LENDING SYSTEM</h1>
    </div>

    <?php
    echo '<table class="borrower" id="account_list">
    <thead>
    <tr>
    <div class="search_bar">
    <input type="button" value="add account" id="add_account_open" onclick="add_account()"></a>
            </div>

    </tr>
    <tr>
        <td>
            <font face="Arial">ID</font>
        </td>
        <td>
            <font face="Arial">Username</font>
        </td>
        <td>
            <font face="Arial">Password</font>
        </td>
        <td>
            <font face="Arial">First Name</font>
        </td>
        <td>
            <font face="Arial">Last Name</font>
        </td>
    </tr> </thead>';
    $sql = "SELECT * FROM accounts";
    $query = mysqli_query($conn, $sql);
    if ($result = $query) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["ID"];
            $field2name = $row["username"];
            $field3name = $row["pass"];
            $field4name = $row["first_name"];
            $field5name = $row["last_name"];
            echo '<tr> 
                      <td>' . $field1name . '</td> 
                      <td>' . $field2name . '</td> 
                      <td>' . $field3name . '</td> 
                      <td>' . $field4name . '</td> 
                      <td>' . $field5name . '</td> 
                      <td><button id="edit"  class="edit" onclick="edit_account()"> edit </button></td> 
                  </tr>';
        }
    }
    echo '</table>';
    ?>

    <div class="modal_add_account " id="modal_add_account">
        <div class="modal_add_account_2">
            <form action="add_account.php" method="post">
                username:<input type="text" id="username" name="username" value=""><br>
                password: <input type="text" id="password" name="password" value=""><br>
                First Name:<input type="text" id="first_name" name="first_name" value=""><br>
                Last Name<input type="text" id="last_name" name="last_name" value=""><br>
                <input type="submit" value="Add Account">
                <input type="reset" value="Reset">
            </form>
        </div>
    </div>
    <div class="modal_edit_account " id="modal_edit_account">
        <div class="modal_edit_account_2">
            <form action="edit_account.php" method="post">
                ID:<input type="text" id="ID" name="ID" value=""><br>
                username:<input type="text" id="username2" name="username2" value=""><br>
                password: <input type="text" id="password2" name="password2" value=""><br>
                First Name:<input type="text" id="first_name2" name="first_name2" value=""><br>
                Last Name<input type="text" id="last_name2" name="last_name2" value=""><br>
                <input type="submit" name="edit_button" value="Edit Account">
                <input type="submit" name="delete_button" value="Delete Account">
            </form>
        </div>
    </div>
</body>

</html>