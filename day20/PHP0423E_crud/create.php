<!-- -form thêm mới sản phẩm


products: id, name, pricce, avatar, creadted_at

-->
<?php 
// nhúng file kết nối
require_once 'connection.php';
session_start();
// xử lý form
// b1: debug
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
// b2: 
$error='';
// không cần biến result vì khi xử lý thành công sẽ chuyển hướng
if(isset($_POST['submit'])){
    // b4:
    $name=$_POST['name'];
    $price=$_POST['price'];
    $avatar=$_FILES['avatar'];
    // b5:
    // tên và giá phải nhập
    if(empty($name)||empty($price)){
        $error='tên và giá phải nhập';
    }elseif(!is_numeric($price)){
        $error='giá phải nhập số';
    }elseif ($avatar['error']==0){
        // file upload phải là ảnh
        $ext=pathinfo($avatar['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $allows=['jpg','png','jpeg','gif'];
        if(!in_array($ext,$allows)){
            $error='file upload không phải là ảnh';
        }
        // file upload dung lượng không vượt quá 2mb
        $size_b=$avatar['size'];
        // 1mb=1024kb
        // 1kb=1024b
        // 1mb=1024*1024b
        $size_mb=$size_b/1024/1024;
        if($size_mb>2){
            $error='file upload dung lượng không vượt quá 2mb';
        }
    }
    // b6:xử lý logic chính khi không có lỗi
    if(empty($error)){
        // upload file để lấy ra tên file
        $filename='';
        if($avatar['error']==0){
            $dir_upload='uploads';
            if(!file_exists($dir_upload)){
                mkdir($dir_upload);
            }
            $filename=time()."".$avatar['name'];
            $is_upload=move_uploaded_file($avatar['tmp_name'],"$dir_upload/$filename");
            var_dump($is_upload);
        }
        // insert vào csdl
        $sql_insert="INSERT INTO products(name, price, avatar) VALUES ('$name',$price,'$filename')";
        // b2: thực thi: insert trả về
        $is_insert= mysqli_query($connection,$sql_insert);
        var_dump($is_insert);
        if($is_insert){
            $_SESSION['success']='thêm sản phẩm mới thành công';
            header('location: index.php');
            exit();
        }
        $error ='thêm mới thất bại';
    }

    // giá phải là số
    // file upload phải là ảnh
    // file upload dung lượng không vượt quá 2mb
}


// b7:đổ error ra form

?>
<h3 style="color: red;"><?php echo $error; ?></h3>

<h2>Form thêm mới sản phẩm</h2>
<form action="" method="post" enctype="multipart/form-data">
    Nhập tên:
    <input type="text" name="name" value="">
    <br>
    Nhập giá:
    <input type="text" name="price">
    <br>
    Chọn ảnh:
    <input type="file" name="avatar" >
    <br>
    <input type="submit" name="submit" value="lưu sp">
    <a href="index.php">Về trang ds</a>
</form>