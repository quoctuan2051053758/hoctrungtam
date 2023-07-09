<?php
// kết nối csdll sử dụng thư viện mysqli, tạo ra biến kết nối dung chung cho 4 chức năng crud
const db_host='localhost';
const db_user='root';
const db_password='';
const db_name='php04233_test';
const db_port=3306;
$connection=mysqli_connect(db_host,db_user,db_password,db_name,db_port);
if(!$connection){
    echo 'lỗi kết nối' . mysqli_connect_errno();
}
echo 'kết nối thành công';

?>