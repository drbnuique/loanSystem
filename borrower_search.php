<?php
include("connection.php");
if(isset($_POST['borrower_search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $sql = "SELECT * FROM borrower WHERE CONCAT(first_name,middle_name,last_name) LIKE '%".$valueToSearch."%'";
    
}
 else {
    $sql = "SELECT * FROM borrower";
}



?>