<?php
    require '../../include/headerAdmin_global.php';
?>
<?php
   require_once '../../include/datas_include/database_connection.php';

    $getId = $_GET['id'];
    // echo $getId;
    $showAllArticleSql = "SELECT * FROM baiviet 
    inner join theloai on theloai.ma_tloai = baiviet.ma_tloai  
    inner join tacgia on tacgia.ma_tgia = baiviet.ma_tgia
     WHERE ma_bviet = $getId";
    // echo $showAllCategorySql;
    $result = mysqli_query($conn, $showAllArticleSql);

    $row = mysqli_fetch_assoc($result);
    $ma_tloai = $row['ma_tloai'];
    $ma_tgia = $row['ma_tgia'];
?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Sửa thông tin bài viếtviết</h3>
                <form action="update_article.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Mã bài viết</span>
                        <input type="text" class="form-control" name="ma_bviet" readonly value="<?php echo $row['ma_bviet'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude" value="<?php echo $row['tieude'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tên bài hát</span>
                        <input type="text" class="form-control" name="ten_bhat" value="<?php echo $row['ten_bhat'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Thể loại</span>
                        <select  name = "the_loai">
                            <?php
                                $showAllCategorySqlExcept = "SELECT * FROM theloai where theloai.ma_tloai != $ma_tloai order by ma_tloai";

                                $resultCategory = mysqli_query($conn, $showAllCategorySqlExcept);
                                ?>
                                <option value="<?=$row['ma_tloai']?>" ><?=$row['ten_tloai']?></option>
                                <?php
                                while($category = mysqli_fetch_assoc($resultCategory)) {   ?>  
 
                                    <option value="<?php echo $category['ma_tloai'] ?>"><?php echo $category['ten_tloai'] ?></option>
                                    
                            <?php
                                } ?>
                            
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" value="<?php echo $row['tomtat'] ?>">
                        
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Nội dung</span>
                        <input type="text" class="form-control" name="noidung" value="<?php echo $row['noidung'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Tác giả</span>
                        <select  name = "tac_gia">
                            <?php
                                $showAllAuthorSqlExcept = "SELECT * FROM tacgia where tacgia.ma_tgia != $ma_tgia order by ma_tgia";

                                $resultAuthor = mysqli_query($conn, $showAllAuthorSqlExcept);
                                ?>
                                <option value="<?php echo $row['ma_tgia']?>" ><?php echo $row['ten_tgia']?></option>
                                <?php
                                while($author = mysqli_fetch_assoc($resultAuthor)) {   ?>  
 
                                    <option value="<?php echo $author['ma_tgia'] ?>"><?php echo $author['ten_tgia'] ?></option>
                                    
                            <?php
                                } ?>
                            
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Đường dẫn ảnh cũ</span>
                        <input type="text" class="form-control"  value="<?php echo $row['hinhanh'] ?>">
                        
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" >Hình ảnh</span>
                        <input type="file" class="form-control" id="article_image" name="hinhanh" accept="image/png, image/jpeg">
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