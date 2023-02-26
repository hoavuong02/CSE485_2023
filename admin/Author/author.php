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

    $showAllCategorySql = "SELECT * FROM tacgia order by ma_tgia";

    $result = mysqli_query($conn, $showAllCategorySql);

    // print_r( mysqli_fetch_assoc($result)); trả ra Array ( [ma_tloai] => 1 [ten_tloai] => Nhạc trẻ )

?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_author.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Tác Giả</th>
                            <th scope="col">Hình Tác Giả</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php $index = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $index++;  ?></th>
                            <td><?= $row['ten_tgia'] ?></td>
                            <td><img style = "width: 150px;" src="../../<?= $row['hinh_tgia'] ?>" alt=""></td>
                            <td>
                                <a href="edit_author.php?id= <?=$row['ma_tgia']?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                
                                <a  onclick = "return confirm('Bạn có chắc chắn muốn xóa tác giả <?=$row['ten_tgia']  ?> ?');" href="delete_author.php?id=<?=$row['ma_tgia']?>"   > <i class="fa-solid fa-trash"></i> </a>

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