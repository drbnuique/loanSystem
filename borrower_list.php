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
    echo '<a href="borrower_list.php" class=active>Borrowers</a>';
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
    <?php
    echo '<table class="borrower">
    <thead>
    <tr>

       <div class="search_bar">
         <form action="" method="post">
            <input type="search" id="search" name="valueToSearch" placeholder="search by name">
            <input type="submit" id="search" name="borrower_search" value="search">
        </form>
        <input type="button" value="add borrower" id="add_borrower_open" onclick="add_borrower()"></a>
            </div>
  
    </tr>
    <tr>
        <td>
            <font face="Arial">ID</font>
        </td>
        <td>
            <font face="Arial">First Name</font>
        </td>
        <td>
            <font face="Arial">Middle Name</font>
        </td>
        <td>
            <font face="Arial">Last Name</font>
        </td>
        <td>
            <font face="Arial">Contact Number</font>
        </td>
        <td>
            <font face="Arial">Address</font>
        </td>
        <td>
            <font face="Arial">email</font>
        </td>
        <td>
            <font face="Arial">Photo</font>
        </td>
        <td>
            <font face="Arial">ID Photo</font>
        </td>
    </tr> </thead>';

    $query = mysqli_query($conn, $sql);
    if ($result = $query) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["borrower_id"];
            $field2name = $row["first_name"];
            $field3name = $row["middle_name"];
            $field4name = $row["last_name"];
            $field5name = $row["contact_no"];
            $field6name = $row["address"];
            $field7name = $row["email"];
            $field8name = $row["borrower_photo"];
            $field9name = $row["id_photo"];

            echo '<tr> 
                      <td>' . $field1name . '</td> 
                      <td>' . $field2name . '</td> 
                      <td>' . $field3name . '</td> 
                      <td>' . $field4name . '</td> 
                      <td>' . $field5name . '</td> 
                      <td>' . $field6name . '</td> 
                      <td>' . $field7name . '</td> 
                      <td> <img src="images/borrower/' . $field8name . '" width="100" height="100" /> </td> 
                      <td> <img src="images/borrower_id/' . $field9name . '" width="100" height="100" /> </td> 
                  </tr>';
        }
    }

    echo '</table>';
    ?>
    <div class="modal_add_borrower " id="modal_add_borrower">
        <div class="modal_add_borrower_2">
            <form action="add_borrower.php" method="post" enctype="multipart/form-data">
                <div class="modal_add_borrower_3">
                    <label for="first_name">First name:</label><br>
                    <input type="text" id="first_name" name="first_name" value=""><br>
                    <label for="middle_name">Middle name:</label><br>
                    <input type="text" id="middle_name" name="middle_name" value=""><br>
                    <label for="last_name">Last name:</label><br>
                    <input type="text" id="last_name" name="last_name" value=""><br>
                    <label for="contact">Contact Number:</label><br>
                    <input type="text" id="contact" name="contact" value=""><br>
                    <label for="address">Address:</label><br>
                    <input type="text" id="address" name="address" value=""><br>
                    <label for="email">Email:</label><br>
                    <input type="text" id="email" name="email" value=""><br><br><br>
                    <input type="submit" value="Add Borrower">
                <input type="reset" value="Reset">  
                </div>
                <div class="modal_add_borrower_4">
                    Borrower picture: <input type="file" id="picture" name="picture"><br>
                    Id picture:<input type="file" id="id_picture" name="id_picture" /><br>

                </div>
                
            </form>
        </div>
    </div>

</body>

</html>