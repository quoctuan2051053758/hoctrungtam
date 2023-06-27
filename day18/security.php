<!-- bảo mật form -->
<!-- 
- 2 lỗi bảo mật phổ biến nhất với 1 form:
+ XSS: Cross-Site Scripting: là kiểu tấn công sử dụng
+ CSRF:Cross-Site Request Forgery: tấn công giả mạo người dùng
VD: là admin,delete.php?id=4
Để chống sử dụng kỹ thuật tạo ra token cho mỗi lần submit form



 -->
 <!-- <a href="delete.php?id=5">
    <img src="../img/anh.jpg" alt="">
 </a> -->
<?php 
if(isset($_POST['submit'])){
    $fullname = $_POST['fullname'];
    // để chống XSS, trước khi hiển thị ra thì cần chuyển các ký tự nguy hiểm như <> thành ký tự an toàn:
    $fullname= htmlspecialchars($fullname);
    echo "tên của bạn: $fullname";
    // <script>alert('Bị dính XSS rồi!')</script>
}



?>
 <h1>Demo XSS</h1>
 <form action="" method="post">
    Nhập tên:
    <input type="text" name="fullname">
    <input type="submit" name="submit" value="Hiển thị">
 </form>