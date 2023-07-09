<?php
session_start();
// logout.php
// xóa session tạo ra lúc đăng nhập thành công.
// chuyển hướng về trang login
unset($_SESSION['username']);
// xóa cookie ghi nhớ đăng nhập:
setcookie('username','',time() - 1);


$_SESSION['success']='logout thành công';
header('location: login.php');
exit();


?>