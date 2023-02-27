<?php
    require_once '../../include/datas_include/database_connection.php';
    $userName = $_POST['txtUserName'];
    $password = $_POST['txtPasword'];
    $email = $_POST['txtEmail'];
    $admin = $_POST['txtAdmin'];
    $updateUserSql = "UPDATE user SET mat_khau = '$password', email = '$email', admin = '$admin' WHERE ten_dnhap =  '$userName'";

//Thực thi câu lệnh

    if(mysqli_query($conn,$updateUserSql )){ //conn để kết nối csdl bên file ketnoi
        header("Location: user.php");
    }
?>