<!-- phiên làm việc, lưu trữ thông tin giữa user và hệ thống 
- session mất khi đóng trình duyệt
- chức năng thực tế: đăng nhập, giỏ hàng ... 
- php tạo 1 mảng $_session lưu toàn bộ session đang có trên hệ thống
- session đc lưu trên server, user sẽ ko thể biết đc 1 trang web đang có các session nào
- bắt buộc phải khơi tạo session thì mới dùng đc $_session


-->
<?php 
session_start(); // khai báo ởngay dưới thẻ mở php




// thao tác cơ bản với session: giống hệt thao tác với mảng
$_SESSION['address']='HN';
$_SESSION['age']=33;
// hiển thị session:
echo $_SESSION['address'];
// xóa session:
// unset($_SESSION['age']);
echo '<pre>';
print_r($_SESSION);
echo '</pre>';

?>