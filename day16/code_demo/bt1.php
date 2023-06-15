<?php
// 1.	Viết hàm tổng – tích – hiệu - thương của các phần tử trong mảng số nguyên sau, sử dụng hàm trong PHP:
// $arrs = [2, 5, 6, 9, 2, 5, 6, 12 ,5];
// viết hàm tính tích từ mảng bất kỳ
// tham số: 1 tham số là mảng
// + giá trị trả về: integer
function multiple($arrs){
    $result =1;
    foreach($arrs AS $number){
        $result *=$number;
    }

    return $result;
}
$r1=multiple([1,2,3]);
echo $r1;
// echo multiple($arrs);
?>
<!-- $arrs = ['PHP', 'HTML', 'CSS', 'JS'];
Hãy viết code hiển thị nội dung như hình sau: -->
<?php 
$arrs = ['PHP', 'HTML', 'CSS', 'JS'];

?>

<table border="1" cellspacing="0">
    <tr>
        <th>Tên khóa học</th>
    </tr>

    <?php foreach($arrs AS $class):?>
        <tr>
            <td><?php echo $class; ?></td>
        </tr>
    <?php endforeach; ?>
</table>


<!-- 14.	Gộp 2 mảng sau dựa theo key của từng mảng -->

<?php 
$array1 = [
    [77, 87],
    [23, 45]
  ];
$array2 = [
    'giá trị 1', 'giá trị 2'
];
echo '<pre>';
print_r($array1);
echo '</pre>';



echo '<pre>';
print_r($array2);
echo '</pre>';
$results=[];
foreach($array2 AS $key=>$v){
    // thêm 1 phần tử mới vào mảng
    $results[$key][]=$v;

}
echo '<pre>';
print_r($results);
echo '</pre>';
foreach($array1 AS $key=>$values){
    foreach($values AS $v){
        $results[$key][]=$v;
    };
}

echo '<pre>';
print_r($results);
echo '</pre>';

?>
