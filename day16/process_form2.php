<!-- xử lý form với các input phức tạp -->
<?php 
// xử lý form:
// b1: debug
echo '<pre>';
print_r($_GET);
echo '</pre>';
// b2:khai báo biến
$result='';
$error='';
// b3:chỉ xử lý form khi submit form
if(isset($_GET['submit'])){
    // b4: lấy giá trị từ form:
    $age =$_GET['age'];
    // php sẽ ko bắt đc dữ liệu từ radio và checkbox nếu như ko tích vào cái nào,nên ko đc lấy giá trị trước
    // $gender=$_GET['gender'];
    // $jobs=$_GET['jobs'];
    $country = $_GET['country'];
    $note=$_GET['note'];
    // b5: validate form:
    // - tuổi phải là số: is_numeric
    // - bắt buộc phải chọn giới tính và nghề nghiệp:kiểm tra tồn tại của phần tử mảng theo key ->isset
    if(!is_numeric($age)){
        $error='tuổi phải là số';
    }elseif(!isset($_GET['gender'])){
        $error='phải chọn giới tính';
    }elseif(!isset($_GET['jobs'])){
        $error='ít nhất phải chọn 1 nghề nghiệp';
    }
    // b6: xử lý logic chính khi không có lỗi
    
}
// b7: đổ error và result ra form

?>

<h3 style="color:red"><?php echo $error;?></h3>
<h3 style="color:yellow"><?php echo $result;?></h3>

<form action="" method="get">
    Nhập tuổi:
    <input type="text" name="age" value="">
    <br>
    chọn giới tính:
    <!-- với radio,PHP dựa vào value tương ứng để biết được dữ liệu gửi lên là của radio nào -->
    <input type="radio" name="gender" value="1">Nam
    <input type="radio" name="gender" value="2">Nữ
    <input type="radio" name="gender" value="3">Khác
    <br>
    Chọn nghề nghiệp:
    <!--với checkbox, nếu có từ 2 checkbox trở lên thì bắt buộc name phải ở dạng mảng  -->
    <input type="checkbox" name="jobs[]">dev
    <input type="checkbox" name="jobs[]">Tester
    <input type="checkbox" name="jobs[]">brSE
    <br>
    chọn quốc gia:
    <select name="country[]" id="">
        <option value="1">VN</option>
        <option value="2">JP</option>
        <option value="3">KR</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"></textarea>
    <br>
    <input type="submit" name="submit" value="hiển thị">
</form>