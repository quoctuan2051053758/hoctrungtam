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



echo '<pre>';
print_r($_POST);
echo '</pre>';
// b2:Khai báo biến chứa lỗi vào kết quả:
$error='';
$result ='';
// b3: chỉ xử lý form khi đã submit form,dựa vào debug mảng
//  B1: dựa vào name của nút submit form
//  về mặt code, ktra nếu mảng tồn tại phần tử với key=name của submit thì chắc chắn form đã đc submit! 
//  sử dụng hàm isset của PHP để ktra mảng có tồn tại phần tử theo key hay ko
if(isset($_POST['info'])){
    // +b4:Lấy giá trị từ form:
    $fullname = $_POST['fullname'];
    // +b5: validate form
    // - tên không được để trống:hàm empty 
    // - tên phải từ 3 ký tự trở lên:strlen
    // - tên phải có định dạng email:Filter_var
    if(empty($fullname))
    {
        $error='Tên không được để trống';
    }elseif(strlen($fullname) < 3){
        $error='tên phải từ 3 ký tự trở lên';
    }elseif(!filter_var($fullname, FILTER_VALIDATE_EMAIL)){
        $error='tên phải đúng định dạng email';
    }
// b6: xử lý logic của bài toán chỉ khi ko có lỗi nào xảy ra
    if(empty($error)){
        $result="tên của bạn: $fullname";
    }
}
// b7: nằm ngoài b3, hiển thị error và result ra form
// b8: đổ lại dữ liệu đã nhập ra form, tăng trải nghiệm user
?>
<h3 style="color:red"><?php echo $error;?></h3>
<h3 style="color:yellow"><?php echo $result;?></h3>



<form action="" method="post">
    Nhạp họ tên:
    <!-- bắt buộc phải khai báo name cho input, vì PHP dựa vào name để biết dữ liệu 
gửi lên từ input nào -->
    <input type="text" name="fullname" 
    value="<?php echo isset($_POST['fullname']) ?  
    $_POST['fullname'] : '' ?>">
    <input type="submit" name="info" value="Hiển thị">



</form>