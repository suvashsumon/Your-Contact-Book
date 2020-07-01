<?php

    session_start();


    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = md5($_POST['pass']);
    $repassword = md5($_POST['repass']);
    require("../connection/conn.php");
    $checkExistance = mysqli_query($conn,"SELECT * FROM user_info WHERE Email='$email'");
    $isExist = mysqli_num_rows($checkExistance);
    if($isExist==0) {
        if ($password == $repassword) {
            mysqli_query($conn, "INSERT INTO user_info (id,Name,Email,Phone,password) VALUES (NULL,'$name','$email','$phone','$password')");
            $result = mysqli_query($conn, "SELECT id FROM user_info WHERE Email='$email'");
            $row = mysqli_fetch_assoc($result);
            $tableName = "contacts_".$row['id'];
            $createTableQuery = "CREATE TABLE ".$tableName." (Contact_Name varchar(255),Address_info varchar(255), Email varchar(255),Phone varchar(255), Tags varchar(255))";
            mysqli_query($conn, $createTableQuery);
            $isExist = mysqli_query($conn, "SELECT * FROM user_info WHERE Email='$email' AND password='$password'");
            $userDara = mysqli_fetch_assoc($isExist);
            $_SESSION['id'] = $userDara['id'];
            $_SESSION['name'] = $userDara['Name'];
            $_SESSION['email'] = $userDara['Email'];
            $_SESSION['phone'] = $userDara['Phone'];
            $_SESSION['tablename'] = "contacts_".$userDara['id'];
            header("location: ../home.php");
        } else {
            header("location: ../index.php?verdict=passnotmatch");
        }
    } else {
        header("location: ../index.php?verdict=hasaccount");
    }
    

 
?>
