<?php

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['pass']);
    $repassword = md5($_POST['repass']);
    $conn = mysqli_connect('localhost','root','','your_contact_book');
    $checkExistance = mysqli_query($conn,"SELECT * FROM user_info WHERE Email='$email'");
    $isExist = mysqli_num_rows($checkExistance);
    if($isExist==0) {
        if ($password == $repassword) {
            mysqli_query($conn, "INSERT INTO user_info (id,Name,Email,Phone,password) VALUES (NULL,'$name','$email','$phone','$password')");
            header("location: ../home.html");
        } else {
            header("location: ../index.html");
        }
    } else {
        header("location: ../index.html");
    }
    

 
?>
