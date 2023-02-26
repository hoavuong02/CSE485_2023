<?php
    require '../../auth.php';
    require '../../include/headerAdmin_global.php';
?>


<?php
                if(isset($_GET['error'])){
                ?>
                    <div class="container mt-3">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong>Error!</strong> <?= $_GET['error'] ?>
                        </div>
                    </div>
<?php  }   ?>

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

    $showAllUserSql = "SELECT * FROM user order by ten_dnhap";

    $result = mysqli_query($conn, $showAllUserSql);


?>
    <main class="container mt-5 mb-5">
        <div class="row">
            <div class="col-sm">
                <a href="add_category.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên đăng nhập</th>
                            <th scope="col">Mật khẩu</th>
                            <th scope="col">Email</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php $index = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $index++;  ?></th>
                            <td><?= $row['ten_dnhap'] ?></td>
                            <td><?= $row['mat_khau'] ?></td>
                            <td><?= $row['email'] ?></td>
                            <td>
                                <a href="edit_user.php?id=<?=$row['ten_dnhap'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a onclick = "return confirm('Bạn có chắc chắn muốn xóa nguời dùng <?=$row['ten_dnhap'] ?>?');"  href="delete_user.php?id=<?=$row['ten_dnhap'] ?>" > <i class="fa-solid fa-trash"></i> </a>
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