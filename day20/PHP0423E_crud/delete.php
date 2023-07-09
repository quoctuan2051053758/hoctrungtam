<?php 
session_start();
require_once 'connection.php';

// delete.php?id=3
// - validate tham số id hợp lệ, vì url dạng GET có thể
// chỉnh sửa đc
if(!isset($_GET['id'])|| !is_numeric($_GET['id'])){
    $_SESSION['error']='Tham số id ko hợp lệ';
    header('location: index.php');
    exit();
}


$id =$_GET['id'];
// - truy vấn csdl để xóa sp theo id
// b1: viết truy vấn:
$sql_delete="DELETE FROM products WHERE id = $id";
// b2: thực thi 
$delete = mysqli_query($connection,$sql_delete);
if($delete){
    $_SESSION['success']='xóa thành công';
}
else{
    $_SESSION['error']="xóa sp thất bại";
}
header('location: index.php');
exit();

?>