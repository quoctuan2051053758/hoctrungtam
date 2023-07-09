<?php
session_start();
// nếu tồn tại cookie user name thì đã ghi nhớ user đã chọn chức năng ghi nhớ đăng nhập,thì chuyển hướng sang trang profile
if(isset($_COOKIE['username'])){
    // tạo session lưu lại trang thái login thành công
    $_SESSION['username']=$_COOKIE['username'];
    $_SESSION['success']='ghi nhớ đăng nhập thành công';
    header('location: profile.php');
    exit();
}




// nếu user đã đăng nhập thì chuyển hướng sang trang profile, ko thể truy cập đc trang login khi đã đăng nhập thành công
if(isset($_SESSION['username'])){
    $_SESSION['success']='bạn đã đăng nhập rồi';
    header('location: profile.php');
    exit();
}





// -Quy trình xử lý form 
// -b1: debug
  echo '<pre>';
  print_r($_POST);
  echo '</pre>';  
// +b2:
$error='';
$result='';
// b3: chỉ xử lý form nếu form đã đc submit:
if (isset($_POST['login'])){
    // b4: lấy giá trị từ form
    $username=$_POST['username'];
    $password=$_POST['password'];
    // b5: validate form
    // - username và password không đc để trống:empty
    // - password phải từ 2 ký tự trở lên:strlen
    if(empty($username)||empty($password)){
        $error='username và password không đc để trống';
    }
    elseif(strlen($password)<2){
        $error='password phải từ 2 ký tự trở lên';
    }
    // b6: xử lý logic chính chỉ khi ko có lỗi:
    if(empty($error)){
        // xử lý đăng nhập
        // session để lưu lại thông tin của user, dựa vào session này để cho phép user sử dụng các chức năng đc phép
        // - giả lập login thành công: mk=123
        if($password==123){
            // -chỉ xử lý ghi nhớ đăng nhập khi login
            // thành công và có tích vào
            // checkbox, ,lưu lại username vào cookie
            if(isset($_POST['remember'])){
                setcookie('username',$username,time()+3600);
            }



            // login thành công
            $_SESSION['success']=' đăng nhập thành công ';
            $_SESSION['username']=$username;
            // Chuyển hướng :
            header('Location:profile.php');
            exit();

        }
        else{
            $error='sai tài khoản hoặc mật khẩu';
        }
    }
}
?>
<?php
// hiển thị session error:
if(isset($_SESSION['error'])){
    echo $_SESSION['error'];
    unset($_SESSION['error']);
}

if(isset($_SESSION['success'])){
    echo  $_SESSION['success'];
    unset($_SESSION['success']);
}
?>

<!-- b7:đổ error và result ra form -->
<h3 style="color: red;"><?php echo $error ?></h3>
<h3 style="color:yellow"><?php echo $result ?></h3>
<form action="" method="post">
    Nhập user:
    <input type="text" name="username">
    <br>
    Nhập password:
    <input type="password" name="password">
    <br>
    <!-- nếu chỉ có duy nhất 1 checkbox thì name ko cần ở dạng mảng -->
    <input type="checkbox" name="remember"> ghi nhớ đăng nhập 
    <br>
    <input type="submit" value="đăng nhập" name="login">

</form>