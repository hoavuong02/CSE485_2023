<?php




//user = abc
//password = 111
// var_dump($_SERVER["REQUEST_METHOD"] == "POST");
session_start();

require_once('include/datas_include/database_connection.php');

if(isset($_POST['txtUser'])) 
{
    $user = $_POST['txtUser'];
    $password = $_POST['txtPassword'];
    
    //tìm trong db bản ghi có tên đăng nhập và mật khẩu giống với người dùng nhập vào
    $getUserPassword = "SELECT ten_dnhap, mat_khau FROM `user` WHERE ten_dnhap = '$user ' AND mat_khau = '$password'";

    $result = mysqli_query($conn, $getUserPassword);
    $row = mysqli_fetch_assoc($result);
    //không tìm thấy bản ghi trùng khớp --> sai tên dnh hoặc mk
    if(!$row){
        header("Location: login.php?error=invalid user or password");
    }
    else {
        $_SESSION['user'] = $user;
        header('Location: admin/index.php');
    }

}


?>