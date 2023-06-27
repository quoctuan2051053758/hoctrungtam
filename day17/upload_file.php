<!-- - xử lý upload_file trong form
- xử lý upload file trong form
+ file là dạng dữ liệu mà không thể đọc hiểu đc, so với các input còn lại
+ xử lý file là cần upload_file đó lên hệ thống
-->


<?php 
// xử lý form: 8 bước
// b1: debug
// mặc định get chỉ bắt đc tên file nên ko thể upload đc file
// form bắt buộc phải thỏa mã 2 điều kiện sau:
// method của form phải là post
// phải thêm thuộc tính enctype cho form
// - sử dụng mảng $_files để xem thông tin tên file đc gửi lên
// - các thông tin trong $_files:
// + name: tên file
// + type: kiểu file
// + tpm_name: temporary = tên đường dẫn tạm thời đang lưu file sau khi chọn file xong,
// dùng cho việc upload về sau
// + error: mã lỗi khi upload file vào đường dẫn tạm, nếu error = 0 thì tải file thành công vào đường dẫn tạm
// size: dung lượng file: mb gb kb byte bit, tính bằng byte
// 1mb = 1024kb, 1kb= 1024b, 1B = 8 bit

echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
$error='';
$result ='';
// +b3: xử lý form chỉ khi form submit:
if(isset($_POST['submit'])){
    // + b4: gán giá trị từ form:
        $avatar=$_FILES['avatar'];
    // + b5: validate
    // - file upload phải là ảnh
    // - file uplad ko đc vượt quá 2MB
    // chú ý khi xử lý file: luôn luôn phải có file đc tỉa lên đường dẫn tạm thành công
    //  error của $_FILES
    if($avatar['error']==0){
        // file upload phải là ảnh
        $extension = pathinfo($avatar['name'],PATHINFO_EXTENSION);
        // - chuyển về chữ thường
        $extension = strtolower($extension);
        // - tạo mảng lưu đuôi file ảnh hợp lệ:
        $allows=['jpg','ipeg','png','gif'];
        // - ktra đuôi file có nằm trong danh sách trên hay ko
        if(!in_array($extension,$allows)){
            $error='file upload phải là ảnh';
        }
        // - file uplad ko đc vượt quá 2MB
        $size_b=$avatar['size'];
        // 1mb= 1024kb=1024*1024 B;
        $size_mb=$size_b/ 1024 / 1024;
        if($size_mb>2){
            $error='file upload ko đc vượt quá 2mb';
        }
    }
    // b6: xử lý logic bài toán chỉ khi ko có lỗi:
    if(empty($error)){
        // xử lý upload file lên hệ thống
        // tạo biến lưu lại tên file sinh ra sau khi upload:
        $filename='';
        // + chỉ upload file nếu có file đc tải lên thành công vào đường dẫn tạm
        if($avatar['error']==0){
            // tạo thư mục sẽ lưu file:
            // tương đối:
            $dir_upload='uploads';
            // tạo thư mục trên bằng code để deploy web lên
            // host về sau, chỉ tạo nếu chưa tồn tại để tránh ghi đè thư mục -> mất dữ liệu
            if(!file_exists($dir_upload)){
                mkdir($dir_upload);
            }
            // + upload file vào thư mục vừa tạo:
            //  cần tạo ra tên file mang tính duy nhất trước khi upload, để tránh ghi đè file
            $filename=time() . '-' . $avatar['name'];
            $is_upload = move_uploaded_file($avatar['tmp_name'],"$dir_upload/$filename");
            var_dump($is_upload);
            if($is_upload){
                $result .="<img src='$dir_upload/$filename' width='100px'>";
            }



        }

    }
}

// b7 đổ error


?>

<h3 style="red"><?php echo $error  ?></h3>
<h3 style="yellow"><?php echo $result  ?></h3>

<form action="" method="post" enctype="multipart/form-data">
    Nhập tên:
    <input type="text" name="fullname">
    <br>
    chọn ảnh đại diện:    
    <input type="file" name="avatar">
    <br>
    <input type="submit" name="submit" value="Upload">
</form>