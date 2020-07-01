<?php
    session_start();
    if (!isset($_SESSION['name'])) {
        header("location: ../index.html");
    }
    $mail = $_SESSION['email'];
    
    $password = $_POST['pass'];
    $repassword = $_POST['repass'];
    require("../connection/conn.php");
    
    if ($password != NULL) {
        if ($password == $repassword) {
            $password = md5($password);
            mysqli_query($conn,"UPDATE `user_info` SET `password`='$password' WHERE Email='$mail'");
            header("location: ../home.php?verdict=settingchanged");
        } else {
            header("location: ../setting.php?verdict=wronginfo");
        }
    } else {
        header("location: ../setting.php?verdict=noinput");
    }
    
?>