<?php

    $email = $_POST['email'];
    require("../connection/conn.php");
    $result = mysqli_query($conn, "SELECT * FROM user_info WHERE Email='$email'");

    if (mysqli_num_rows($result)==1) {
        $password = "qerty7374LOGICAL";
        $cryptedPass = md5($password);
        mysqli_query($conn, "UPDATE user_info SET password='$cryptedPass' WHERE Email='$email'");
        //$message = "Your password : ".$password."\nPlease change this password immidiately after log in.";
        //mail($email,"Your Contact Book Password",$message,"From: yourcontactbook@suvashkumar.xyz");
        header("location: ../index.php");
    } else {
        header("location: ../index.php");
    }





?>