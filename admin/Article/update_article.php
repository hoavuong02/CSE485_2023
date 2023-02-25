<?php
  

if(isset($_POST['tieude']))  {

//process upload hinh anh

$upload_path   = '../../images/songs/';
$path_db_uncompleted = 'images/songs/';

function create_filename($filename, $upload_path)              // Function to make filename
{
    $basename   = pathinfo($filename, PATHINFO_FILENAME);      // Get basename
    $extension  = pathinfo($filename, PATHINFO_EXTENSION);     // Get extension
    $basename   = preg_replace('/[^A-z0-9]/', '-', $basename); // Clean basename
    $filename   = $basename . '.' . $extension;                // Add extension to clean basename
    $i          = 0;                                           // Counter
    while (file_exists($upload_path . $filename)) {            // If file exists
        $i        = $i + 1;                                    // Update counter 
        $filename = $basename . $i . '.' . $extension;         // New filepath
    }
    return $filename;                                          // Return filename
}

if ($_FILES['hinhanh']['error'] == 0) {                          // If no upload errors
  // If there are no errors create the new filepath and try to move the file
    $filename    = create_filename($_FILES['hinhanh']['name'], $upload_path);

    $destination = $upload_path . $filename;
    $moved       = move_uploaded_file($_FILES['hinhanh']['tmp_name'], $destination);
    $path_db_completed = $path_db_uncompleted . $filename;
  
}

//end  
    $ma_bviet = $_POST['ma_bviet'];
    $tieude= $_POST['tieude'];
    $ten_bhat = $_POST['ten_bhat'];
    //lấy mã thể loại 
    $ma_tloai = $_POST['the_loai'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $ma_tgia = $_POST['tac_gia'];

  require_once '../../include/datas_include/database_connection.php';

  $updateArticleSql = "UPDATE baiviet SET tieude = '$tieude', ten_bhat = '$ten_bhat', ma_tloai = '$ma_tloai', tomtat = '$tomtat', noidung = '$noidung'
  , ma_tgia = '$ma_tgia', ngayviet = current_timestamp(), hinhanh = '$path_db_completed'
  where ma_bviet = $ma_bviet" ;

//Thực thi câu lệnh

    if(mysqli_query($conn,$updateArticleSql)){ //conn để kết nối csdl bên file ketnoi
        header("Location: article.php");
    }
}

?>