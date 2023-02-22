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



-- d. Liệt kê các bài viết với các thông tin sau: mã bài viết, tên bài viết, tên bài hát, tên tác giả, tên 
-- thể loại, ngày viết.



--f. Liệt kê 2 tác giả có số bài viết nhiều nhất
SELECT tacgia.ma_tgia,tacgia.ten_tgia from baiviet,tacgia
WHERE tacgia.ma_tgia = baiviet.ma_tgia 
GROUP BY baiviet.ma_tgia
ORDER BY COUNT(baiviet.ma_tgia) DESC LIMIT 2;

-- g. Liệt kê các bài viết về các bài hát có tựa bài hát chứa 1 trong các từ “yêu”, “thương”, “anh”,“em”


SELECT * from baiviet 
WHERE ten_bhat LIKE '%yêu%' OR ten_bhat LIKE '%thương%' OR ten_bhat LIKE '%anh%' OR ten_bhat LIKE '%em%';