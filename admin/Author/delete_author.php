
<?php

require_once '../../include/datas_include/database_connection.php';

$getId = $_GET['id']; //id hiện tại của author

$deleteCategorySql = "DELETE FROM tacgia WHERE ma_tgia = $getId";

$sql1 = "SELECT ma_tgia FROM baiviet";
$result = mysqli_query($conn, $sql1);

$deleteArticle = "DELETE FROM baiviet WHERE ma_tgia = $getId";

$found = false;
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    foreach ($row as $key => $value) {
        // echo $row[$key];
        if ($value == $getId) {
            $found = true; // trùng lặp đánh dấu true
            break 2; // thoát khỏi cả hai vòng lặp while và foreach
        }
    }
}

if ($found) { //=true tìm thấy sự trùng lặp
    // header("Location: author.php?error=Tác giả không xóa được do đang tồn tại trong trang article");
?>

    <script>
        
        if (confirm('Để xóa tác giả này bạn phải xóa hết tác giả này trong trang bài viết?') == true) {
            // sử dụng AJAX để gọi script PHP xóa bài viết
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // chuyển hướng trang sau khi xóa thành công
                    window.location.href = 'author.php?success=Xóa Thành Công!';
                   
                }
            };
            xmlhttp.open('GET', 'deleteArticleAndAuthor.php?id=' + <?php echo $getId; ?>, true);
            xmlhttp.send();
        }
        else {
            // chuyển hướng trang về trang danh sách tác giả
            window.location.href = 'author.php';
        }
    </script>

<?php
    // header("Location: author.php?success=Xóa Thành Công!");

} else {
    mysqli_query($conn, $deleteCategorySql);
   
    header("Location: author.php?success=Xóa Thành Công!");
}

?>



