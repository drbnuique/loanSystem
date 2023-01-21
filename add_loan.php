<?php
include("connection.php");

$borrower_id = $_POST['borrower_id'];
$loan_purpose = $_POST['loan_purpose'];
$loan_amount = $_POST['loan_amount'];
$loan_duration = $_POST['loan_duration'];
$loan_interest = $_POST['loan_interest'];
$total_amount = $_POST['total_amount'];
$monthly_payment = $_POST['monthly_payment'];
$loan_month_left = $_POST['loan_duration'];
$loan_amount_left = $_POST['total_amount'];
// database insert SQL code
$sql = "INSERT INTO loan (borrower_id, loan_purpose, loan_amount, loan_duration,
 loan_interest, loan_total_amount, loan_monthly_payment, loan_month_left, loan_amount_left,loan_start_date)
 VALUES ( '$borrower_id', '$loan_purpose ', '$loan_amount', '$loan_duration', '$loan_interest', '$total_amount'
 , '$monthly_payment', '$loan_month_left', '$loan_amount_left',NOW())";


// insert borrower in database
$rs = mysqli_query($conn, $sql);

if($rs)
{
    echo "<script>alert('Loan Records Inserted')</script>";
    echo '<script>
    window.location.replace("loan_list.php");
   </script>';
}
else
    echo "<script>alert('Loan Records Didnt Inserted Properly')</script>";
    echo '<script>
    window.location.replace("loan_list.php");
   </script>';