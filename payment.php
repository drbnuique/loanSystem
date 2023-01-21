<?php
include("connection.php");

$loan_id = $_POST['loan_id'];
$monthly_payment = $_POST['monthly_payment2'];
$monthly_pay = $_POST['monthly_payment'];

// database insert SQL code
$sql = "UPDATE loan
SET loan_amount_left = loan_amount_left - $monthly_pay, loan_month_left = loan_month_left - 1
WHERE loan_id = $loan_id";

// insert borrower in database
$rs = mysqli_query($conn, $sql);

if ($rs) {
    echo "<script>alert('Payment received')</script>";
    $sql = "INSERT INTO archive (loan_id, borrower_id, loan_amount, loan_interest, loan_total_amount, loan_duration)
    SELECT loan_id, borrower_id, loan_amount, loan_interest, loan_total_amount, CONCAT(loan_start_date,' to ',DATE_ADD(loan_start_date, INTERVAL loan_duration MONTH)) AS date_add FROM loan WHERE loan_month_left = 0";
    $rs = mysqli_query($conn, $sql);
    $sql = "DELETE FROM loan WHERE loan_month_left = 0;";
    $rs = mysqli_query($conn, $sql);
    echo '<script>
    window.location.replace("loan_list.php");
   </script>';
} else
    echo "<script>alert('Payment failed, please try again')</script>";
echo '<script>
    window.location.replace("loan_list.php");
   </script>';
