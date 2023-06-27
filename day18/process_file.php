<!-- thao tác đọc ghi file: 
- thực tế: import sử dụng đọc file, export sử dụng ghi file
- thực tế:import sử dụng đọc file, export sử dụng ghi file
1/ đọc file:
+ đọc từng dòng
+ đọc toàn bộ file
tạo 1 file note.txt cùng cấp file hiện tại, nhập nội dung tùy ý từ 3 hàng trở lên


-->

<?php 
// 1 - đọc file
// + đọc từng dòng: giữ nguyên đc fomat của file
// + đọc toàn bộ: không phân biệt khoảng trắng''
$reads =file('note.txt');
echo '<pre>';
print_r($reads);
echo '</pre>';
foreach ($reads AS $read){
    echo $read .'<br>';
}
// đọc toàn bộ: ko phân biệt khoảng trắng giữa các hàng
$content=file_get_contents('note.txt');
var_dump($content);
// echo file_get_contents('https://vnexpress.net/');
// 2 - ghi file:
// + ghi đè
file_put_contents('demo.txt','abc 123');
// + ghi nối tiếp
file_put_contents('tt.txt','ạkdgasjkd',FILE_APPEND);
// 3 - xóa file:
unlink('abc.txt');
// 4 - krta đường dẫn file/ thư mục có tồn tại hay ko:
// file_exists



?>
