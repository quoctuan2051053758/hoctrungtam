<!-- demo.php -->
<?php 
    echo 'hello world';
    echo "<br>";
    // 1 - Truyền tham trị và tham chiếu
    // viết hàm đổi giá trị của 1 biến bên ngoài
    function changeNumber($num){
        $num=3;
        echo "bên trong hàm biến có giá trị bằng = $num <br>";
    }
    $number = 5;
    echo "Bên ngoài hàm, biến có giá trị = $number <br>";
    changeNumber($number);
    echo "sau khi gọi hàm, biến có giá trị = $number";


    // Hàm changeNumber đang truyền giá trị theo kiểu tham trị,
    // là chỉ truyền giá trị của biến ban đầu vào hàm, tạo ra 1 bản sao chứa giá trị chuyền vào hàm, bản gốc ko hề thay đổi



    
    // truyền tham chiếu
// truyền tham chiếu, thêm dấu & trước tên tham số của hàm
    function changeNumber1(&$num){
        $num=3;
        echo "bên trong hàm biến có giá trị bằng = $num <br>";
    }
    $number = 5;
    echo "<br>Bên ngoài hàm, biến có giá trị = $number <br>";
    changeNumber1($number);
    echo "sau khi gọi hàm, biến có giá trị = $number";

    // truyền tham chiếu là truyền bản gốc vào hàm, còn truyền tham trị là truyền bản sao
// vd hàm truyền tham thiếu:
    $arr=[3, 5, 6, 7];
    sort($arr);
    
?>
