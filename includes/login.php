<?php

    $email = $_POST['email'];
    $password = md5($_POST['pass']);
    $conn = mysqli_connect('localhost','root','','your_contact_book');
    $isExist = mysqli_query($conn, "SELECT * FROM user_info WHERE Email='$email' AND password='$password'");
    if (mysqli_num_rows($isExist)==1) {
        header("location: ../home.html");
    } else {
        echo "create a account";
    }
?>
