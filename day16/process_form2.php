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
    if(empty($error)){
        $result .="Tuổi: $age <br>";
        // xử lý radio
        $gender=$_GET['gender'];
        // $result .="Giới tính: $gender <br>"; //giới tính:2
        $gender_text='';
        switch($gender){
            case 1:$gender_text='nam'; break;
            case 2: $gender_text='nữ'; break;
            case 3: $gender_text='khác';
        }
        $result .= "giới tính: $gender_text <br>";
        // xử lý checkbox:
        $jobs = $_GET['jobs'];
        $jobs_text='';
        foreach ($jobs AS $job){
            switch($job){
                case 1: $jobs_text .=' tester';break;
                case 2: $jobs_text .=' Dev'; break;
                case 3: $jobs_text .=' brS';
            }
        }
        $result .="Nghề nghiệp: $jobs_text <br>";
        $country_text='';
        switch ($country) {
            case 1: $country_text = 'VN';break;
            case 2: $country_text = 'JP';break;
            case 3: $country_text = 'KR';
        }
        $result .="Quốc gia: $country_text <br>";
        $result .= "Ghi chú: $note";
    }
}
// b7: đổ error và result ra form

?>

<h3 style="color:red"><?php echo $error;?></h3>
<h3 style="color:yellow"><?php echo $result;?></h3>

<form action="" method="get">
    Nhập tuổi:
    <input type="text" name="age" value="<?php echo isset($_GET['age']) ? $_GET['age'] : '' ?>">
    <br>
    chọn giới tính:
    <!-- với radio,PHP dựa vào value tương ứng để biết được dữ liệu gửi lên là của radio nào -->

    <?php 
    // -đổ dữ liệu radio là can thiệp thuộc tính checker
    // + có bao nhiêu radio thì tạo từng đó biến để lưu checked
    $check_male='';
    $check_female='';
    $check_another='';
    // + xử lý nếu submit form thì mới gán:
    if(isset($_GET['gender'])){
        switch ($_GET['gender']){
            case 1: $check_male='checked'; break;
            case 2: $check_female='checked'; break;
            case 3: $check_another='checked';
        }
    }
    // + hiển thị vào tương ứng với radio

    ?>
    <input <?php echo $check_male ?> type="radio" name="gender" value="1">Nam
    <input <?php echo $check_female ?> type="radio" name="gender" value="2">Nữ
    <input <?php echo $check_another ?> type="radio" name="gender" value="3">Khác
    <br>
    Chọn nghề nghiệp:

    <?php 
        $checked_dev='';
        $checked_tester='';
        $checked_brse='';
        // kiểm tra nếu submit form thì xử lý gán checked
        if(isset($_GET['jobs'])){
            foreach ($_GET['jobs'] AS $job){
                switch($job){
                    case 1: $checked_dev='checked';break;
                    case 2: $checked_tester='checked';break;
                    case 3: $checked_brse='checked';
                }
            }
        }


    ?>
    <!--với checkbox, nếu có từ 2 checkbox trở lên thì bắt buộc name phải ở dạng mảng  -->
    <input <?php echo $checked_dev ?>  type="checkbox" name="jobs[]"value="1" >dev
    <input <?php echo $checked_tester ?> type="checkbox" name="jobs[]" value="2">Tester
    <input <?php echo $checked_brse ?> type="checkbox" name="jobs[]" value="3">brSE
    <br>
    chọn quốc gia:
    <?php 
    // can thiệp selected vào option, xử lý giống hệt radio
    $checked_vn='';
    $checked_JP='';
    $checked_kr='';
    if(isset($_GET['country'])){
        switch($_GET['country']){
            case 1: $checked_vn='selected';break;
            case 2: $checked_JP='selected';break;
            case 3: $checked_kr='selected';
        }
    }
    
    
    ?>
    <select name="country" id="">
        <option <?php echo  $checked_vn ?> value="1">VN</option>
        <option <?php echo  $checked_JP ?> value="2">JP</option>
        <option <?php echo  $checked_kr ?> value="3">KR</option>
    </select>
    <br>
    Ghi chú:
    <textarea name="note"><?php echo isset($_GET['note']) ?$_GET['note'] : '' ?></textarea>
    <br>
    <input type="submit" name="submit" value="hiển thị">
</form>