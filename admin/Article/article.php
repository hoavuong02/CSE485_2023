<?php
    require '../../auth.php';
    require '../../include/headerAdmin_global.php';
?>

<?php
                if(isset($_GET['success'])){
                ?>
                <div class="container mt-3">
                   <div class="alert alert-success alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Success!</strong> <?= $_GET['success'] ?>
                    </div>
                </div>
<?php  }   ?>

<?php ?>

 <script>
        //  document.querySelector(".alert");
        setTimeout(function(){
            document.querySelector(".alert").style.display = "none";
        },5000)
 </script>
<?php ?>
<?php
    require_once '../../include/datas_include/database_connection.php';

    $showAllArticleSql = "SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, theloai.ten_tloai, tacgia.ten_tgia FROM baiviet INNER JOIN theloai on theloai.ma_tloai = baiviet.ma_tloai INNER JOIN tacgia on tacgia.ma_tgia = baiviet.ma_tgia ORDER by baiviet.ma_bviet;";

    $result = mysqli_query($conn, $showAllArticleSql);

    // print_r( mysqli_fetch_assoc($result)); trả ra Array ( [ma_tloai] => 1 [ten_tloai] => Nhạc trẻ )

?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Thể loại</th>
                            <th scope="col">Tác giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php $index = 1;  while($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $index++;  ?></th>
                            <td><?= $row['tieude'] ?></td>
                            <td><?= $row['ten_bhat'] ?></td>
                            <td><?= $row['ten_tloai'] ?></td>
                            <td><?= $row['ten_tgia'] ?></td>
                            <td>
                                <a href="edit_article.php?id=<?=$row['ma_bviet'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a onclick = "return confirm('Bạn có chắc chắn muốn xóa bài viết <?=  $row['tieude']  ?> này?');"  href="delete_article.php?id=<?=$row['ma_bviet'] ?>" > <i class="fa-solid fa-trash"></i> </a>
                            </td>
                        </tr>

                    </tbody>

                    <?php } ?>
                </table>
            </div>
        </div>
    </main>
<?php
     require '../../include/footerAdmin_global.php';
?>