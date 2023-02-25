<?php
    require '../../include/headerAdmin_global.php';
    require_once '../../include/datas_include/database_connection.php';

    $showAllCategorySql = "SELECT * FROM theloai order by ma_tloai";

    $resultCategory = mysqli_query($conn, $showAllCategorySql);


    $showAllAuthorSql = "SELECT tacgia.ma_tgia, tacgia.ten_tgia FROM tacgia order by ma_tgia";

    $resultAuthor = mysqli_query($conn, $showAllAuthorSql);
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Thêm mới bài viết</h3>
                <form action="process_add_article.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Thể loại</span>
                        <!-- <input type="text" class="form-control" name="ten_tloai" > -->
                        <select  name = "the_loai">
                            <option value="" disabled selected>Chọn một thể loại</option>
                            <?php
                                while($row = mysqli_fetch_assoc($resultCategory)) {   ?>  
 
                                    <option value="<?php echo $row['ma_tloai'] ?>"><?php echo $row['ten_tloai'] ?></option>
                                    
                            <?php
                                } ?>
                            
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" >
                        
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Nội dung</span>
                        <input type="text" class="form-control" name="noidung" >
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tác giả</span>
                        <!-- <input type="text" class="form-control" name="ten_tgia" > -->
                        <select  name = "tac_gia">
                            <option value="" disabled selected>Chọn một tác giả</option>
                            <?php
                                while($row = mysqli_fetch_assoc($resultAuthor)) {   ?>  
                                    <option value="<?php echo $row['ma_tgia'] ?>"><?php echo $row['ten_tgia'] ?></option>
                            <?php
                                } ?>
                            
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Hình ảnh</span>
                        <input type="file" class="form-control" id="article_image" name="hinhanh" accept="image/png, image/jpeg" >
                    </div>
                    

                    <div class="form-group  float-end ">
                        <input type="submit" value="Thêm" class="btn btn-success">
                        <a href="category.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
<?php
     require '../../include/footerAdmin_global.php';
?>