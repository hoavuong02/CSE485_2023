<?php
    require '../../include/headerAdmin_global.php';
?>
<?php
    require_once '../../include/datas_include/database_connection.php';

    $showAllCategorySql = "SELECT * FROM theloai order by ma_tloai";

    $result = mysqli_query($conn, $showAllCategorySql);

    // print_r( mysqli_fetch_assoc($result)); trả ra Array ( [ma_tloai] => 1 [ten_tloai] => Nhạc trẻ )

?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_category.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên thể loại</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php $index = 1; while($row = mysqli_fetch_assoc($result)) { ?>
                    <tbody>
                        <tr>
                            <th scope="row"><?= $index++;  ?></th>
                            <td><?= $row['ten_tloai'] ?></td>
                            <td>
                                <a href="edit_category.php?id=<?=$row['ma_tloai'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a onclick = "return confirm('Bạn có chắc chắn muốn xóa Thể Loại này?');"  href="delete_category.php?id=<?=$row['ma_tloai'] ?>" > <i class="fa-solid fa-trash"></i> </a>
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