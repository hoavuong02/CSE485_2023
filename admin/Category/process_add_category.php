<?php
  
  $nameCategory= $_POST['txtCatName'];

  require_once '../../include/datas_include/database_connection.php';

  $addnameCategorySql = "INSERT INTO theloai(ten_tloai) VALUES ('$nameCategory')";

//Thực thi câu lệnh

    if(mysqli_query($conn,$addnameCategorySql)){ //conn để kết nối csdl bên file ketnoi
        header("Location: category.php");
    }
   
?>