<?php
session_start();
include("connection.php");
include("loan_search.php");
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
    echo '<a href="loan_list.php"  class=active>Loans</a>';
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
    echo '<table id="table" class="borrower">
    <tr>

    <div class="search_bar">
      <form action="" method="post">
         <input type="search" id="search" name="valueToSearch" placeholder="search by ID">
         <input type="submit" id="search" name="loan_search" value="search">
     </form>
     <input type="button" value="add loan" id="add_loan_open" onclick="add_loan()" ></a>
         </div>
</tr>
    <tr>
        <td>
            <font face="Arial">ID</font>
        </td>
        <td>
            <font face="Arial">Borrower Name</font>
        </td>
        <td>
            <font face="Arial">Loan  Purpose</font>
        </td>
        <td>
            <font face="Arial">Loan <br>Amount</font>
        </td>
        <td>
            <font face="Arial">Loan <br>Duration</font>
        </td>
        <td>
            <font face="Arial">Loan <br>Interest</font>
        </td>
        <td>
            <font face="Arial">Total<br> Amount</font>
        </td>
        <td>
            <font face="Arial">Monthly <br> Payment</font>
        </td>
        <td>
            <font face="Arial">Next <br>Payment</font>
        </td>
        <td>
            <font face="Arial">Amount<br> Left</font>
        </td>
        
    </tr>';

    $query = mysqli_query($conn, $sql);
    if ($result = $query) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["loan_id"];
            $field2name = $row["borrower_id"];
            $field3name = $row["loan_purpose"];
            $field4name = $row["loan_amount"];
            $field5name = $row["loan_duration"];
            $field6name = $row["loan_interest"];
            $field7name = $row["loan_total_amount"];
            $field8name = $row["loan_monthly_payment"];
            $field9name = $row["loan_month_left"];
            $field10name = $row["loan_amount_left"];
            //pansamatagalang fix
            $query_name = mysqli_query($conn, "SELECT CONCAT(first_name,' ',middle_name,' ',last_name) AS full_name FROM borrower WHERE borrower_id=$field2name");
            if ($result = $query) {
                $row = $query_name->fetch_assoc();
                $field2name = $row['full_name'];
            }
            $query_name = mysqli_query($conn, "SELECT DATE_ADD(loan_start_date, INTERVAL loan_duration MONTH) AS date_add FROM loan WHERE loan_id=$field1name");
            if ($result = $query) {
                $row = $query_name->fetch_assoc();
                $field5name = $row['date_add'];
            }
            $query_name = mysqli_query($conn, "SELECT DATE_ADD(loan_start_date, INTERVAL loan_duration-(loan_month_left-1) MONTH) AS date_add FROM loan WHERE loan_id=$field1name");
            if ($result = $query) {
                $row = $query_name->fetch_assoc();
                $field9name = $row['date_add'];
            }
            echo '<tr> 
                      <td>' . $field1name . '</td> 
                      <td>' . $field2name . '</td> 
                      <td>' . $field3name . '</td> 
                      <td>' . $field4name . '</td> 
                      <td>' . $field5name . '</td> 
                      <td>' . $field6name . ' %</td> 
                      <td>' . $field7name . '</td> 
                      <td>' . $field8name . '</td> 
                      <td>' . $field9name . '</td> 
                      <td>' . $field10name . '</td> 
                      <td> <button id="pay"  class="pay" onclick="pay_loan_test()"> pay </button> </td> 
                  </tr>';
        }
    }
    echo '</table>';




    //for drop down

    ?>

    <!--for searching loans-->
    <form action="" method="post">
        <input type="search" id="search" name="valueToSearch" value="" placeholder="search loan ID"><br>
        <input type="submit" name="loan_search" value="search">
        <input type="reset" value="Reset">
    </form>

    <!--for payment -->
    <div class="modal_container" id="modal_container">
        <div class="modal">
            <form action="payment.php" method="post">
                <!--for auto complete option-->
                Reference ID<input type="text" id="loan_id" name="loan_id" readonly></br>
                Monthly Payment<input type="number" id="monthly_payment2" name="monthly_payment2" value="<?php echo $monthly_payment; ?> " readonly></br>
                Payment This Month<input type="number" id="monthly_payment" name="monthly_payment">
                <input type="submit" value="Pay Loan">
            </form>



        </div>
    </div>
    <!--for adding new loans -->
    <div class="modal_add_loan" id="modal_add_loan">
        <div class="modal_add_loan_2">
            <form action="add_loan.php" method="post">
                <!--for auto complete option-->
                Borrower Id<input list="borrower_id2" name="borrower_id" id="borrower_id">
                <datalist id="borrower_id2">
                    <?php
                    $query = mysqli_query($conn, "SELECT borrower_id, CONCAT('borrower ID :',borrower_id,' ',first_name,' ',middle_name,' ',last_name) AS full_name FROM borrower");
                    while ($row = $query->fetch_assoc()) {

                        unset($id, $name);
                        $id = $row['borrower_id'];
                        $name = $row['full_name'];
                        echo '<option value="' . $id . '">' . $name . '</option>';
                    }

                    ?>
                </datalist>

                loan purpose <input type="text" id="loan_purpose" name="loan_purpose" value=""><br>
                loan amount<input type="number" id="loan_amount" name="loan_amount" value=""><br>
                Loan Duration<input type="number" id="loan_duration" name="loan_duration" value=""><br>
                Loan Interest<input type="number" id="loan_interest" name="loan_interest" value=""><br>
                Total Amount w/ interest <input type="number" id="total_amount" name="total_amount" value=""><br>
                Monthly Payment<input type="number" id="monthly_payment3" name="monthly_payment" value="">
                <input type="button" value="compute" onclick="compute()"><br>
                <input type="submit" value="Add Loan">
                <input type="reset" value="Reset">
            </form>
            <button id="add_loan_close">Back</button>
        </div>
    </div>
</body>

</html>