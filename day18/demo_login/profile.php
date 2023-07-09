<?php

session_start();

// nếu chưa đăng nhập thì ko cho truy cập trang này, bằng cách chuyển hướng về trang login
if(!isset($_SESSION['username'])){
    $_SESSION['error']='bạn chưa đăng nhập,không thể vào trang profile!';
    header('Location: login.php');
    exit();
}


echo '<pre>';
print_r($_SESSION);
echo '</pre>';
// echo $_SESSION['success'];
// echo " chào bạn, {$_SESSION['username']}"
// chỉ hiển thị 1 lần với session dạngt thông báo- session flash
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}
echo "<br>Chào bạn, {$_SESSION['username']}"; 


echo "<a href='logout.php'>logout</a>";
?>