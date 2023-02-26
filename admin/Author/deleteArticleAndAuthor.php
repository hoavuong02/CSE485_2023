<?php

require_once '../../include/datas_include/database_connection.php';

$getId = $_GET['id']; //id hiện tại của author

$deleteArticle = "DELETE FROM baiviet WHERE ma_tgia = $getId";

$deleteAuthorSql = "DELETE FROM tacgia WHERE ma_tgia = $getId";


if (mysqli_query($conn, $deleteArticle) && mysqli_query($conn, $deleteAuthorSql )) {
    echo "success";
} else {
    echo "fail";
}

?>