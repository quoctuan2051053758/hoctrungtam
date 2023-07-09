<!--connect.php
1 - Cachs PHP kết nối CSDL MySQL sử dụng thư viện mysqli
+ Thư viện mysqli hỗ trợ kết nối từ PHP tới MySQL
+ Mặc định khi cài XAMPP enable sẵn thư viện mysqli
+ CHỉ hỗ trợ kết nối tới 1 CSDL duy nhất là MySQL
+ Hỗ trợ code PHP thuần và cả hướng đối tượng -> Theo PHP thuần
vì dễ học và định hình các bước tương tác CSDL
+ Thực tế nên sử dụng khác là PDO để kết nối CSDL, tuy nhiên PDO hoàn toàn sử dụng code hướng đối tượng

dùng chức năng designer để vẽ sơ đồ quan hệ giữa các bảng có liên kết,
để bắt buộc pải khai báo tường minh



-->
<?php
// + Chuẩn bị CSDL : php0423e2_crud
// + Chuẩn bị 2 bảng : danh mục và sản phẩm có liên kết với nhau:
// Categories : id, name, created_at
// Products :
// id : Khóa chính
// category_id : khóa ngoại , INT , nên đặt tên theo quy tắc
// name : VARCHAR
// price : INT
// avarta : VARCHAR, chỉ lưu tên file
// create_at: TIMESTAMP
// - Các bước kết nối CSDL MySQL từ PHP

// b1: khởi tạo kết nối
// tên máy chủ đang lưu csdl: localhost
const DB_HOST='localhost';
// username đăng nhập vào csdl: root(xampp)
const DB_USERNAME ='root';
// password đăng nhập vào csdl: chuỗi rỗng (xampp)
const DB_PASSWORD='';
// tên csdl kết nối
const DB_NAME='php0423e2_crud';
// cổng csdl sẽ kết nối:
const DB_PORT=3306;


$connection = mysqli_connect(DB_HOST,
DB_USERNAME,DB_PASSWORD,
DB_NAME,DB_PORT);

if(!$connection){
    die('lỗi kết nối: ' . mysqli_connect_errno());
}
echo 'kết nối csdl thành công';
// 2 -truy vấn insert
// product: id, category_id,name,price, avatar,created_at
// + b1: viết truy vấn
$sql_insert="INSERT INTO product(category_id,name,price,avatar) VALUES(1,'IphoneX',1000,'iphone.png')";
// +b2: thực thi truy vấn: mysqli_query, với insert update delete trả về boolean
$is_insert=mysqli_query($connection,$sql_insert);

var_dump($is_insert);

// cách debug khi bị false: copy câu truy vấn ở b1, chạy trực tiếp trên phpmyadmin

// 3: truy vấn update:
// sửa name=abc,price=123 cho bản ghi có id = 1;
// b1: viết truy vấn
$sql_update="UPDATE product SET name ='abc',price=123 WHERE id = 1  ";
// b2: thực thi truy vấn
$is_update=mysqli_query($connection,$sql_update);
var_dump($is_update);


// 4:truy vấn delete:
// xóa sp có id >10
// b1: viết truy vấn
$sql_delete="DELETE FROM product WHERE id>10 ";
$is_delete= mysqli_query($connection,$sql_delete);
var_dump($is_delete);

// 5:truy vấn select:
// + lấy 1 bản ghi: lấy sp có id=1
// b1: viết truy vấn
$sql_select_one="SELECT * FROM product WHERE id=1";
// b2: thực thi truy vấn: select trả về 1 obj trung gian sau khi thực thi
$result_one=mysqli_query($connection,$sql_select_one);

echo '<pre>';
print_r($result_one);
echo '</pre>';
// b3: lấy thông tin dưới dạng mảng kết hợp từ obj
// trung gian:
$product=mysqli_fetch_assoc($result_one);
echo '<pre>';
print_r($product);
echo '</pre>';


// + lấy nhiều bản ghi: lấy tất cả sp theo thứ tự mới nhất -> cũ nhất


// b1: viết truy vấn:
$sql_select_all="SELECT *FROM product ORDER BY create_at DESC";//ASC 
// b2: thực thi: SELECT trả về obj trung gian
$result_all=mysqli_query($connection,$sql_select_all);
// b3: lấy thông tin dưới dạng mảng kết hợp 2 chiều:
$products=mysqli_fetch_all($result_all,MYSQLI_ASSOC);

echo '<pre>';
print_r($products);
echo '</pre>';


?>