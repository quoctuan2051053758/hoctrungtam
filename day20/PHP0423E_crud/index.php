<!-- xây dựng ứng dung CRUD sản phẩm
- CRUD - CREATE read update delete, là 4 chức năng cơ bản của mọi chức năng trong thực thế
- là cách tiếp cận tốt nhất để hiểu đc 1 ngôn ngữ lập trình tương tác với CSDL thông qua giao diện user như thế nào
+ tạo cấu trúc file/ thư mục:
php0423e_crud/
             /create.php:thêm mới
             /index.php: danh sách
             /update.php: sửa
             /delete.php:xóa
             /connection.php: kết nối csdl dùng chung cho 4 chức năng CRUD
+ tạo csdl:php0423e2_test
+ tạo bảng products: id, name, price, avatar,created_at

- code crud products: code chức năng nào trc? c - r - u - d
 index.php
 danh sách sản phẩm: là trang đầu tiên trong crud show cho user
-->

<?php 
session_start();
require_once 'connection.php';
// truy vấn csdl lấy ra tất cả sp
// b1: viết truy vấn: lấy ra tất cả sản phẩm theo thứ tự mới nhất -> cũ nhất
$sql_select_all="SELECT * FROM products ORDER BY created_at DESC";
// b2: thực thi select trả về obj trung gian
$result_all=mysqli_query($connection,$sql_select_all);
// b3: trả về mảng kết hợp 2 chiều:
$products=mysqli_fetch_all($result_all, MYSQLI_ASSOC);
echo '<pre>';
print_r($products);
echo '</pre>';


?>


<?php 
// hiển thị session dạng thông báo (flash)
if(isset($_SESSION['success'])){
    echo $_SESSION['success'];
    unset($_SESSION['success']);
}


?>

<a href="create.php">thêm mới sp</a>
<h2>Danh sách sản phẩm</h2>

<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Avatar</th>
        <th>Created at</th>
        <th></th>
    </tr>
    <?php foreach($products AS $product): ?>
    <tr>
        <td><?php echo $product['id']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo number_format($product['price'],0,'.','.'); ?></td>
        <td>
            <img src="uploads/<?php echo $product['avatar'] ?>" alt="" height="50px" >
        </td>
        <td>
            <!-- 06/07/2023 20:13:30 -->
            <!-- trong csdl,Y-m-d, h:i:s -->
            <?php echo date('d/m/Y H:i:s',strtotime($product['created_at'])); ?>
        </td>
        <td>
            <a href="delete.php?id=<?php echo $product['id'] ?>" onclick="return confirm('chắc chắn muốn xóa')">Xóa</a>
            <span><a href="update.php?id=<?php echo $product['id'] ?>">Sửa</a></span>
        </td>
    </tr>
    <?php endforeach ?>

</table>
