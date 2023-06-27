<?php
// cần chắc chắn cookie sinh ra mới thao tác
// 
echo isset($_COOKIE['class']) ? $_COOKIE['class'] : ''; //php


?>
<!-- sự giống nhau:
đều dùng để lưu trữ theo cơ chế khởi tạo 1 lần và truy cập đc từ mọi nơi
+ khác nhau:
- session lưu trên server, cookie lưu trên trình duyệt
- session mất đi khi đóng trình duyệt, còn cookie phụ thuộc vào thời gian sống
2/ demo login đơn giản áp dụng session và cookie
tạo cấu trúc thư mục:
demo_login /
            /login.php: xử lý form đăng nhập
            /profile.php: hiển thị thông tin user đăng nhập thành công
            /logout.php: xử lý đăng xuất user




-->