<?php
    
    require_once '../../include/datas_include/database_connection.php';
    $upload_path   = '../../';

    $getId = $_GET['id'];
    
    //phục vụ việc xóa ảnh trong folder

    $sqlgetlinkImg2  = "SELECT hinhanh FROM baiviet WHERE ma_bviet = $getId "; 
    $resultlinkImg2 = mysqli_query($conn, $sqlgetlinkImg2);
    $rowlinkImg2 = mysqli_fetch_assoc($resultlinkImg2);

    $pathImg2 = $upload_path.$rowlinkImg2['hinhanh'];
//---------------------------------------------------

    $deleteCategorySql = "DELETE FROM baiviet WHERE ma_bviet = $getId  ";

    //Thực thi câu lệnh

    if(mysqli_query($conn,$deleteCategorySql)){ //conn để kết nối csdl bên file ketnoi
        if (file_exists($pathImg2)) {                       // If image file exists
            $unlink = unlink($pathImg2);                    // Delete image file
        }   
        header("Location: article.php?success=Xóa Thành Công!");
    }
 
?>