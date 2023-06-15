<?php 
    // 1- TOÁN TỬ
    // - toán tử số học: + - * / ++ --
    $x=5;
    $sum=$x++ + ++$x; //12
    // - toán tử so sánh: >< >= <= != !== == ===
    $check = (3==='3');//false
    // - toán tử logic: && || !
    // - toán tử gán: = += -+ *= /= %=
    $x=5;
    $x *= 2; // $x = $x*2
    // toán tử điều kiện:
    $age =5;
    if($age>0){
        echo 'tuoi > 0';
    }
    else{
        echo 'tuoi<=0';
    }
    echo $age>0 ? "tuoi > 0 ":"tuoi < 0"; // ưu tiên
// 2-câu lệnh điều kiện: if elseif else switch case
// thẻ viết tắt của câu lệnh điều kiện khi hiển thị 1 khối
// html phức tạp
// vd: Ktra nếu biểu thức là true thì hiển thị cấu trúc bảng HTML
// 1 hàng 4 cột
$number = 2;
if ($number > 0){
    // echo "<table border='1' cellspacing='0'>";
    //     echo "<tr>";
    //         echo '<td>a</td>';
    //         echo '<td>b</td>';
    //         echo '<td>c</td>';
    //         echo '<td>d</td>';
    //     echo "</tr>";
    // echo "</table>";
// -> code phức tạp và dễ sai sót (thiếu thẻ mở thẻ đóng)
// -> khi hiển thị HTML phức tạp bằng echo của PHP
// -> nên dùng thẻ viết tắt để tách biệt code HTML và PHP

}
?>
<?php if($number > 0): ?>
<table border=1 cellspacing='0'>
    <tr>
        <td>A</td>
        <td>B</td>
        <td>C</td>
        <td>D</td>
    </tr>
</table>
<?php endif; ?>


<?php if(1>2): ?>
    <h1>Thẻ H1</h1>
<?php else: ?>
    <h2>Thẻ h2</h2>
<?php endif; ?>

<?php
// 3-vòng lặp: for, while, d0..while
// 4-từ khóa break - continue


?>