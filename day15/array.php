<?php 
// kiểu dữ liệu mảng trong PHP
// -  Mảng là 1 kiểu dữ liệu trong PHP, lưu trữ đc nhiều giá trị tại 
// 1 thời điểm, các giá trị này nó có thể là bất cứ dữ liệu nào, 
// kể cả mảng
// 2 cú pháp khai báo mảng: 2 cách
// c1: áp dụng cho mọi phiên bản PHP
// $names =array('a','b','c');
// // c2:PHP=>5.4, ưu tiên dùng c2
// $name = ['a','b','c'];
// 3- thuật ngữ liên quan đến mảng
$names=['a','b','c','d','e'];
// + element: là phần tử mảng, đặc trưng bởi cặp key/value
// + Key: giá trị để xác định phần tử mảng
// + Value:giá trị tương ứng của phần tử mảng theo key
// - với mảng mà ko chỉ định key tường mình, key bắt đầu từ 0 
// vd:
// phần tử mảng thứ 3: key-2, value='c';
// phần tử mảng thứ 5: key=4,value='e'
// cách debug để xem thông tin mảng tường minh key/value
var_dump($names);
// cách debug hay dùng với mảng
echo '<pre>';
print_r(($names));
echo '</pre>';
// 4-lấy giá trị của phần tử mảng
echo $names[2];
// echo $names[10]; cần chú ý để ko thao tác với phần tử mảng ko tồn tại
// 5- vòng lặp foreach
// cần hiển thị toàn bộ tên trong mảng -> thao tác với toàn bộ phần tử mảng-> vòng lặp
$names=['a','b','c','d','e'];
$c=count($names);//5
for ($key=0;$key<$c;$key++) {
    echo $names[$key];
}
// -> lặp mảng bằng for thì phải tính số phần tử mảng trước,
// và phải để ý điều kiện lặp -> nhiều thao tác, và ko áp dụng đc cho nhiều kiểu mảng trong PHP
// -> Luôn luôn sử dụng foreach để lặp mảng trong PHP
//  -> có 2 cú pháp:
// dạng đầy đủ key/value
$names=['a','b','c','d','e'];
foreach($names AS $key => $value){
    echo "<br> Key: $key, value: $value";
}
// foreach lặp qua phần tử mảng, đi qua mỗi phần tử xác định luôn key/value
//+ dạng khuyết key:
$names=['a','b','c','d','e'];
foreach($names AS $v){
    echo "<br> value: $v";
}

// 6 - Phân loại mảng:
// +Mảng tuần tự/số nguyên: key chỉ là ở dạng số nguyên
$numbers=[1,3,4];
// + mảng kết hợp: key xuất hiện ở dạng chuỗi
$infors =[
    'name'=>'tuan',
    'tuoi'=>21,
    'adress'=>'ND'
];
// lấy giá trị thủ công:
echo $infors['name'];


foreach($infors AS $k => $value){
    echo "<br> key: $k,value: $value";
}
// mảng đa chiều: mảng trong mảng
$infos =[
    'class_name'=>'PHP0423E2',
    'districts'=>['a','b','c']
];
echo '<pre>';
print_r($infos);
echo '</pre>';
// cần chú ý khi sử dung mảng đa chiều với foreach, ko echo đơn thuần vì sẽ có phần tử mảng có giá trị là 1 mảng!
// nếu mảng là do bạn tự định nghĩa, thì nên dừng ở tối đa 3 chiều
// lấy giá trị thủ công từ mảng đa chiều:
$infos =[
    'class_name'=>'PHP0423E2',
    'districts'=>['a','b','c']
];
echo $infos['districts'][2];
// 7- 1 số hàm có sẵn thao tác với mảng
// + tính tổng mảng: array_sum
echo '<br>';
$arr=[2,3,5,12];
echo array_sum($arr); //22
// kiemtra phải là kiểu mảng hay ko :is_array
$check = is_array($arr);
var_dump($check);



?>