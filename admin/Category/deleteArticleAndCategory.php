<?php

require_once '../../include/datas_include/database_connection.php';

$getId = $_GET['id']; //id hiện tại của author

$deleteArticle = "DELETE FROM baiviet WHERE ma_tloai = $getId";

$deleteCategorySql = "DELETE FROM theloai WHERE ma_tloai = $getId";


if (mysqli_query($conn, $deleteArticle) && mysqli_query($conn, $deleteCategorySql )) {
    echo "success";
} else {
    echo "fail";
}

?>