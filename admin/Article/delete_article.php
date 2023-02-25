<?php
    
    require_once '../../include/datas_include/database_connection.php';

    $getId = $_GET['id'];
    
    $deleteCategorySql = "DELETE FROM baiviet WHERE ma_bviet = $getId  ";

    //Thực thi câu lệnh

    
    if(mysqli_query($conn,$deleteCategorySql)){ //conn để kết nối csdl bên file ketnoi
        header("Location: article.php");
    }
 
?>