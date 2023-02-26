
<?php

//process upload hinh anh


$upload_path   = '../../images/authors/';
$path_db_uncompleted = 'images/authors/';

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

if ($_FILES['txtAuthFile']['error'] == 0) {                          // If no upload errors
  // If there are no errors create the new filepath and try to move the file
    $filename    = create_filename($_FILES['txtAuthFile']['name'], $upload_path);

    $destination = $upload_path . $filename;
    $moved       = move_uploaded_file($_FILES['txtAuthFile']['tmp_name'], $destination);
    $path_db_completed = $path_db_uncompleted . $filename;
  
}

//end  


require_once '../../include/datas_include/database_connection.php';
$idAuth = $_POST['txtAuthId'];
$nameAuthor = $_POST['txtAuthName'];

$updateAuthSql = "UPDATE tacgia SET ten_tgia = '$nameAuthor',hinh_tgia = '$path_db_completed' WHERE ma_tgia = $idAuth ";


//Thực thi câu lệnh

    if(mysqli_query($conn,$updateAuthSql)){ //conn để kết nối csdl bên file ketnoi
        header("Location: author.php");
    }


?>