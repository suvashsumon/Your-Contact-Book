<?php
    session_start();


    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    require("../connection/conn.php");
    $isExist = mysqli_query($conn, "SELECT * FROM user_info WHERE Email='$email' AND password='$password'");
    if (mysqli_num_rows($isExist)==1) {
        $userDara = mysqli_fetch_assoc($isExist);
        $_SESSION['id'] = $userDara['id'];
        $_SESSION['name'] = $userDara['Name'];
        $_SESSION['email'] = $userDara['Email'];
        $_SESSION['phone'] = $userDara['Phone'];
        $_SESSION['tablename'] = "contacts_".$userDara['id'];
        header("location: ../home.php");
    } else {
        header("location: ../index.php?verdict=noaccount");
    }
?>
