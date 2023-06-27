<!-- cookie trong PHP:
+   Lưu thông tin trên trình duyệt, nghĩa là có thể xem đc 1 trang web lưu cookie gì vào trình duyệt
+ không tự mất đi khi đóng trình duyệt mà phụ thuộc vào thời gian sống đc set lúc tạo ra
+ cookie dùng cho quảng cáo và tăng tốc độ tải trang
+ tạo sẵn mảng $_cookies lưu toàn bộ thông tin cookie đang có trên hệ thống
+ cách xem cookie trên trình duyệt: truy cập web mà muốn xem, inspeact -> application -> storage


-->

<?php 
// thao tác với cookies:
// - thêm cookie:
// $_COOKIE['class']='php'; không thêm như thêm mảng
setcookie('class','php',time()+3600);//sống trong 1h
setcookie('age',33,time()+10);//sống trong 10s
// hiển thị:
echo $_COOKIE['class'];//php
// xóa:set thời gian sống là số âm
setcookie('age','',time() -1);



echo '<pre>';
print_r($_COOKIE);
echo '</pre>';



?>