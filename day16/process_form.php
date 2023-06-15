<!-- 
xử lý form trong PHP

là xử lý rất quan trọng với bất cứ 1 website nào 
-bằng mát thường: form là nơi cho nhập dữ liệu trên web
-form có dạng chính:
    + form lấy thông tin dưới dạng cơ bản
    + form lấy thông tin dưới dạng file

- có thể lấy thông tin mà không cần dùng form, sử dụng Ajax

vd: form nhập họ teen, sau đó hiển thị họ tên
-->
<!-- form có 2 thuộc tính cơ bản:
+ acction là url/file mà thông tin từ form đc gửi lên và được xử lý thông thường set chính file
hiện tại xử lý form =chuỗi rỗng
+ post: phương thức gửi dữ liệu lên action
Get:dữ liệu gửi lên đc hiển thị trên URL theo dạng tên-file.php?param1=value1&param2=value2...
không dùng GET cho form có dữ liệu nhạy cảm như Password,banking. Chức năng phổ biến nhất
với GET là tìm kiếm


Post:truyền ngầm dữ liệu, dùng cho form cần bảo mật
-->


<?php 
// xử lý form phía trên HTML của form để có hiển thị thông tin  sau khi xử lý PHP xong ở vị trí tùy ý
// QUy trình xử lý form: 
// +B1: debug
// dựa vào method của form để debug mảng lưu dữ liệu từ form gửi lên tương ứng
// mehod = GET => PHP có sẵn mảng $_GET
// method = POST => $_POST
?>
<form action="" method="post">
    Nhạp họ tên:
    <!-- bắt buộc phải khai báo name cho input, vì PHP dựa vào name để biết dữ liệu 
gửi lên từ input nào -->
    <input type="text" name="fullname" value="">
    <input type="submit" name="info" value="Hiển thị">



</form>