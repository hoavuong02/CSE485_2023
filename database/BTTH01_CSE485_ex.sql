-- a. Liệt kê các bài viết về các bài hát thuộc thể loại Nhạc trữ tình 
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, baiviet.ma_tloai, baiviet.tomtat, baiviet.noidung, baiviet.ma_tgia, baiviet.hinhanh 
from baiviet
LEFT JOIN theloai on theloai.ma_tloai=baiviet.ma_tloai
WHERE theloai.ten_tloai LIKE "Nhac tru tinh";

-- b. Liệt kê các bài viết của tác giả “Nhacvietplus”
SELECT baiviet.ma_bviet, baiviet.tieude, baiviet.ten_bhat, baiviet.ma_tloai, baiviet.tomtat, baiviet.noidung, baiviet.ma_tgia, baiviet.hinhanh 
from baiviet
LEFT JOIN tacgia on tacgia.ma_tgia=baiviet.ma_tgia
WHERE tacgia.ten_tgia = "Nhacvietplus";


-- c. Liệt kê các thể loại nhạc chưa có bài viết cảm nhận nào
SELECT ten_tloai FROM theloai WHERE ma_tloai Not IN (SELECT ma_tloai FROM baiviet);


-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên 
-- thể loại, ngày viết.










--h. Liệt kê các bài viết về các bài hát có tiêu đề bài viết hoặc tựa bài hát chứa 1 trong các từ 
--“yêu”, “thương”, “anh”, “em”
SELECT *
FROM baiviet
WHERE tieude LIKE '%yêu%'
	OR tieude LIKE '%anh%'
    OR tieude LIKE '%em%'
    OR tieude LIKE '%thương%';