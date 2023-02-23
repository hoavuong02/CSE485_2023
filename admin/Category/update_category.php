<?php
    require_once '../../include/datas_include/database_connection.php';
    $nameCategory = $_POST['txtCatName'];
    $idCategory = $_POST['txtCatId'];
    $updateCategorySql = "UPDATE theloai SET ten_tloai = '$nameCategory' WHERE ma_tloai =  $idCategory";
    
    // print_r($updateCategorySql);
//Thực thi câu lệnh

    if(mysqli_query($conn,$updateCategorySql )){ //conn để kết nối csdl bên file ketnoi
        header("Location: category.php");
    }
?>