
<?php 
session_start();
echo '<pre>';
echo $_SESSION['address'];
echo '</pre>';
// khi khởi tạo session r thì hiển thị ko bị lỗi,
// nếu chưa khơi tọa mà cố tình truy cập thì sẽ hết báo lỗi
echo isset($_SESSION['address']) ? $_SESSION['address']: '';



?>
<!-- test đặc điểm của session là khởi tạo 1 lần, sử dụng mọi nơi -->