<?php
    require '../../include/headerAdmin_global.php';
?>
<?php
   require_once '../../include/datas_include/database_connection.php';

    $getId = $_GET['id'];
    // echo $getId;
    $showAllCategorySql = "SELECT * FROM theloai WHERE ma_tloai = $getId";
    // echo $showAllCategorySql;
    $result = mysqli_query($conn, $showAllCategorySql);

    $row = mysqli_fetch_assoc($result);
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                <form action="update_category.php" method="post"> <!--gửi dữ liệu đến update_category.php -->
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã thể loại</span>
                        <input type="text" class="form-control" name="txtCatId" readonly value="<?=$row ['ma_tloai'] ?>" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                        <input type="text" class="form-control" name="txtCatName"  value = "<?= $row ['ten_tloai'] ?>">
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Lưu lại" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
        
    </main>
<?php
     require '../../include/footerAdmin_global.php';
?>