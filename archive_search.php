<?php
include("connection.php");
if(isset($_POST['archive_search']))
{
    $valueToSearch = $_POST['valueToSearch'];

    $sql = "SELECT * FROM archive WHERE id LIKE '%".$valueToSearch."%'";
    
}
 else {
    $sql = "SELECT * FROM archive";
}



?>