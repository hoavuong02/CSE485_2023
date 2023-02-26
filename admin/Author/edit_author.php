<?php
    require '../../include/headerAdmin_global.php';
?>
<?php
   require_once '../../include/datas_include/database_connection.php';

    $getId = $_GET['id'];
    // echo $getId;
    $showAuthorWithId = "SELECT * FROM tacgia WHERE ma_tgia = $getId";
    // echo $showAllCategorySql;
    $result = mysqli_query($conn, $showAuthorWithId);

    $row = mysqli_fetch_assoc($result);
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin thể loại</h3>
                <form action="update_author.php" method="post" enctype="multipart/form-data"> <!--gửi dữ liệu đến update_category.php -->
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatId">Mã Tác Giả</span>
                        <input type="text" class="form-control" name="txtAuthId" readonly value="<?=$row ['ma_tgia'] ?>" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthName">Tên Tác Giả</span>
                        <input type="text" class="form-control" name="txtAuthName" value =  "<?= $row ['ten_tgia'] ?>" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthName">Đường dẫn cũ</span>
                        <input type="text" class="form-control filetg" name="txtAuthFile" value = "<?= $row['hinh_tgia'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblAuthName">Hình Tác Giả</span>
                        <input style = "margin-left: 10px;" type="file" class="form-control filetg" name="txtAuthFile">
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