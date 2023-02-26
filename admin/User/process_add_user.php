<?php
  
  $txtUserName= $_POST['txtUserName'];
  $txtUserPass= $_POST['txtUserPass'];
  $txtUserEmail= $_POST['txtUserEmail'];


  require_once '../../include/datas_include/database_connection.php';

  $addUserSql = "INSERT INTO user(ten_dnhap,mat_khau,email,ngay_dki) VALUES ('$txtUserName','$txtUserPass','$txtUserEmail',current_timestamp())";

//Thực thi câu lệnh

    if(mysqli_query($conn,$addUserSql)){ //conn để kết nối csdl bên file ketnoi
        header("Location: user.php");
        // echo mysqli_query($conn,$addUserSql);
        echo "OK";
    }
   
?>