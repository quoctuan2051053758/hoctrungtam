<?php
//kiến thức căn bản của PHP
//1-biến
$name='phamquoctuan';
echo $name;
echo '<br>';
// + Quy tắc đặt tên biến
//$1name='manhvn'
// 2 - kiểu dữ liệu:
//+ integer: kiểu số nguyên,phạm vi - 2 tỉ -> 2tur
$number1=123;
$number2= -2;
//hàm debug trong PHP
var_dump($number1);
echo '<br>';
// +float/double: kiểu số thực hoặc số nguyên ngoài phạm vi của integer
$number3 = 1.23;
var_dump($number3);
// +string: kiểu chuỗi, được bao bởi ' hoặc "
$str1='tring1';
$str2="string 2";
$str3="hello,'tuanpham'";
$fullname ='PhamQuocTuan';
//Nối chuỗi:
echo "tên của bạn: ". $fullname;
//hiển thị biến trực tiếp bên trong chuỗi mà ko cần nối chuỗi,
// với điều kiện phải dùng dấu "
echo '<br>';
echo "tên của bạn: $fullname";
echo'Tên của bạn: $fullname';
//+boolean :Kiểu true/false
$is_check = true;
$is_gender=false;
$is_test = true;
echo '<br>';
var_dump($is_check);
// + null: xảy ra khi gọi 1 đối tượng ko tồn tại
$var1 = null;
var_dump($var1);
//+array: kiểu mảng, lưu đc nhiều giá trị tại 1 thời điểm
$arr1=array(123,1.23,'string1'); //c1
$arr2=[123,1.23,'string1'];//c2
//-> ưu tiên cách 2 cho ngắn gọn
// + object : kiểu đối tượng
// 4-ép kiểu: sử dụng tên kiểu dữ liệu muốn ép sang
$var = 11.2;
var_dump($var);//float
$var1 = (integer)$var;
var_dump($var1);//11
$var2=(string)$var;
echo '<br>';
var_dump($var2);
$var3=(boolean)$var;
echo '<br>';
var_dump($var3);
//Các giá trị sau khi ép về boolean sẽ là false: số 0, chuỗi rỗng giá trị null, mảng rỗng
//if(2){
//    echo'abc';
//}
//5-hằng
// + cú pháp
//c1:
define('PI',3.14);
echo PI;
//c2:
const MAX_UPLOAD =10;
// ưu tiên dùng c2 cho ngắn gọn
// + 1 số hằng có sẵn của PHP:
echo'<br>';
echo __LINE__;
echo'<br>';
echo __FILE__;
echo'<br>';
echo __DIR__;
//6 - hàm: hàm ko có tham số, ko có giá trị trả về
//+ hàm có tham số, không có giá trị trả về
//+ hàm có tham số, có giá trị trả về: nên viết hàm theo hướng này
//vd viết hàm tính tổng của 2 số bất kỳ:
//- xác định tham sốL 2 tham số
//- xác định kiểu dữ liệu trả về: integer/float
function sum($number1,$number2){
    return $number1+$number2;
}
echo '<br>';
echo sum(1,2);
?>