<?php

include("connection.php");
if(isset($_POST['loan_search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $sql = "SELECT * FROM loan WHERE loan_id LIKE '%".$valueToSearch."%'";
    
}
 else {
    $sql = "SELECT * FROM loan";
    //$sql2 = "SELECT CONCAT(first_name,' ',middle_name,' ',last_name) AS full_name FROM borrower WHERE borrower_id=$field2name";
}



?>