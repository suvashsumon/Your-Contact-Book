<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("location: ../index.php");
    } else {
        require("../connection/conn.php");
        $name = $_POST['name'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $tags = $_POST['tags'];
        $query = "INSERT INTO ".$_SESSION['tablename']." (Contact_Name, Address_info, Email, Phone, Tags) VALUES ('".$name."', '".$address."', '".$email."', '".$phone."', '".$tags."')";
        if (mysqli_query($conn, $query)) {
            header("location: ../home.php?verdict=success");
        } else {
            header("location: ../home.php?verdict=tryagain");
        }
    }
?>