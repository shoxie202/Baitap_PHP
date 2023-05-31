<?php
// Bài 1: Viết chương trình PHP, sử dụng câu lệnh điều kiện if else để kiểm tra 1 số là số chẵn hay số lẻ?
echo "Bài 1: ";
$number = 30; // 
if ($number % 2 == 0) {
    echo "Số $number là số chẵn.";
} else {
    echo "Số $number là số lẻ.";
}
echo "<br>";

// Bài 2: Viết chương trình PHP, sử dụng câu lệnh if else để xếp hạng học lực của học sinh dựa trên điểm điểm thi giữa kỳ, điểm thi cuối kỳ.
echo "Bài 2: ";
$diemGiuaKy = 6.5; 
$diemCuoiKy = 7.0; 
$diemTrungBinh = ($diemGiuaKy * 0.3) + ($diemCuoiKy * 0.7);
if ($diemTrungBinh >= 9.0) {
    echo "Hạng: Xuất sắc";
} elseif ($diemTrungBinh >= 7.0) {
    echo "Hạng: Giỏi";
} elseif ($diemTrungBinh >= 5.0) {
    echo "Hạng: Khá";
} else {
    echo "Hạng: Trung bình - Yếu";
}
echo "<br>";

// Bài 3: Kiểm tra năm nay là năm chẵn hay năm lẻ, in ra màn hình kết quả chẵn hay lẻ.
echo "Bài 3: ";
$namHienTai = date("Y"); 
if ($namHienTai % 2 == 0) {
    echo "Năm $namHienTai là năm chẵn.";
} else {
    echo "Năm $namHienTai là năm lẻ.";
}
echo "<br>";

// Bài 4: Viết chương trình PHP, sử dụng câu lệnh vòng lặp For để in ra số từ 1 đến 100.
echo "Bài 4: ";
for ($i = 1; $i <= 100; $i++) {
    echo $i . " ";
}
echo "<br>";

// Bài 5: Viết trang PHP hiển thị dãy số từ 1 đến 100 sao cho số chẵn là chữ in đậm, số lẻ là chữ in thường.Kết quả: 1 2 3 4….., 100
echo "Bài 5: ";
for ($i = 1; $i <= 100; $i++) {
    if ($i % 2 == 0) {
        echo "<strong>$i</strong> ";
    } else {
        echo "$i ";
    }
}
echo "<br>";

// Bài 6:  Viết chương trình PHP, sử dụng vòng lặp Foreach in ra các năm trong mảng có sẵn dưới đây: $nam = array(1990, 1991, 1992, 1993, 1994, 1995);
echo "Bài 6: ";
$nam = array(1990, 1991, 1992, 1993, 1994, 1995);
foreach ($nam as $year) {
    echo $year . " ";
}
?>












