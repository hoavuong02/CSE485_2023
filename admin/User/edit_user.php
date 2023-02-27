<?php
    require '../../include/headerAdmin_global.php';
?>
<?php
   require_once '../../include/datas_include/database_connection.php';

    $getId = $_GET['id'];
    // echo $getId;
    $showUserWithId = "SELECT * FROM user WHERE ten_dnhap = '$getId'";
    // echo $showAllCategorySql;
    $result = mysqli_query($conn, $showUserWithId);

    $row = mysqli_fetch_assoc($result);
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin người dùng</h3>
                <form action="update_user.php" method="post" enctype="multipart/form-data"> <!--gửi dữ liệu đến update_category.php -->
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Tên đăng nhập</span>
                        <input type="text" class="form-control" name="txtUserName" readonly value="<?=$row ['ten_dnhap'] ?>" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthName">Mật khẩu</span>
                        <input type="text" class="form-control" name="txtPasword" value =  "<?= $row ['mat_khau'] ?>" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthName">Email đăng ký</span>
                        <input type="text" class="form-control filetg" name="txtEmail" value = "<?= $row['email'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthName">Là admin</span>
                        <input type="text" class="form-control filetg" name="txtAdmin" value = "<?= $row['admin'] ?>">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="author.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
        
    </main>
<?php
     require '../../include/footerAdmin_global.php';
?>