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
            $result = mysqli_query($conn, "SELECT id FROM user_info WHERE Email='$email'");
            $row = mysqli_fetch_assoc($result);
            $tableName = "contacts_".$row['id'];
            $createTableQuery = "CREATE TABLE ".$tableName." (Contact_Name varchar(255),Address_info varchar(255), Email varchar(255),Phone varchar(255), Tags varchar(255))";
            if (mysqli_query($conn, $createTableQuery)) {
                echo "table created";
            } else {
                echo "table creation failed";
            }
            
            //header("location: ../home.html");
            echo $tableName;
        } else {
            header("location: ../index.html");
        }
    } else {
        header("location: ../index.html");
    }
    

 
?>
