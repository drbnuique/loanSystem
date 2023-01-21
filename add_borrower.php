<?php

include("connection.php");

$first_name = $_POST['first_name'];
$middle_name = $_POST['middle_name'];
$last_name = $_POST['last_name'];
$contact = $_POST['contact'];
$address = $_POST['address'];
$email = $_POST['email'];
$picture = $_FILES['picture']['name'];
$id_picture = $_FILES['id_picture']['name'];



// database insert SQL code
$sql = "INSERT INTO borrower (first_name, middle_name, last_name, contact_no, address, email, borrower_photo, id_photo)
 VALUES ( '$first_name', '$middle_name ', '$last_name', '$contact', '$address', '$email', '$picture', '$id_picture')";

// insert in database
$rs = mysqli_query($conn, $sql);

    $filename = $_FILES['picture']['name'];  
    $tempname = $_FILES['picture']['tmp_name'];
    $filename2 = $_FILES['id_picture']['name'];
    $tempname2 = $_FILES['id_picture']['tmp_name'];

    $folder = "C:/xampp/htdocs/3rdYear_1stSem/web_programming/loanSystem/images/borrower/" . $filename;
    $folder2 = "C:/xampp/htdocs/3rdYear_1stSem/web_programming/loanSystem/images/borrower_id/" . $filename2;
    // Add the image to the "image" folder"
    if (move_uploaded_file($tempname, $folder) && move_uploaded_file($tempname2, $folder2)) {

        $msg = "Image uploaded successfully";
        echo "<script>alert('borrower Records Inserted')</script>";
        echo '<script>
        window.location.replace("borrower_list.php");
       </script>';
    } else {

        $msg = "Failed to upload image";
        echo "<script>alert('borrower Records Didnt Inserted Properly')</script>";
        echo '<script>
        window.location.replace("borrower_list.php");
       </script>';
    }