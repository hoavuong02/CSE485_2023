<?php
  
  $txtUserName= $_POST['txtUserName'];
  $txtUserPass= $_POST['txtUserPass'];
  $txtUserEmail= $_POST['txtUserEmail'];
  $txtUserAdmin= $_POST['txtUserAdmin'];


  require_once '../../include/datas_include/database_connection.php';

  $addUserSql = "INSERT INTO user(ten_dnhap,mat_khau,email,ngay_dki,admin) VALUES ('$txtUserName','$txtUserPass','$txtUserEmail',current_timestamp(), '$txtUserAdmin')";

//Thực thi câu lệnh

    if(mysqli_query($conn,$addUserSql)){ //conn để kết nối csdl bên file ketnoi
        header("Location: user.php");
        // echo mysqli_query($conn,$addUserSql);
        echo "OK";
    }
   
?>