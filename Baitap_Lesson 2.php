<?php
//b1
echo "b1: ";
$str = "Hello, World!";
$length = strlen($str);
echo "Số ký tự trong chuỗi là: " . $length;
echo "<br>";
//b2
echo "b2: ";
$str = "Hello, World!";
$wordCount = str_word_count($str);
echo "Số từ trong chuỗi là: " . $wordCount;
echo "<br>";
//b3
echo "b3: ";
$str = "Hello, World!";
$reversedStr = strrev($str);
echo "Chuỗi đảo ngược là: " . $reversedStr;
echo "<br>"; 
//b4
echo "b4: ";
$str = "Hello, World!";
$searchStr = "World";
$position = strpos($str, $searchStr);
if ($position !== false) {
    echo "Chuỗi con được tìm thấy tại vị trí: " . $position;
} else {
    echo "Chuỗi con không được tìm thấy trong chuỗi.";
}
echo "<br>";
//b5
echo "b5: ";
$str = "Hello, World!";
$searchStr = "World";
$replaceStr = "Universe";
$newStr = str_replace($searchStr, $replaceStr, $str);
echo "Chuỗi mới sau khi thay thế là: " . $newStr;
echo "<br>";
//b6
echo "b6: ";
$str = "Hello, World!";
$searchStr = "Hello";
$result = strncmp($str, $searchStr, strlen($searchStr));
if ($result === 0) {
    echo "Chuỗi bắt đầu bằng chuỗi con.";
} else {
    echo "Chuỗi không bắt đầu bằng chuỗi con.";
}
echo "<BR>";
//b7
echo "b7: ";
$str = "Hello, World!";
$upperStr = strtoupper($str);
echo "Chuỗi chữ hoa là: " . $upperStr;
echo "<br>";
//b8
echo "b8: ";
$str = "Hello, World!";
$lowerStr = strtolower($str);
echo "Chuỗi chữ thường là: " . $lowerStr;
echo "<br>";
//b9
echo "b9: ";
$str = "hello, world!";
$capitalizedStr = ucwords($str);
echo "Chuỗi in hoa chữ cái đầu tiên của mỗi từ là: " . $capitalizedStr;
echo "<br>";
//b10
echo "b10: ";
$str = "   Hello, World!   ";
$trimmedStr = trim($str);
echo "Chuỗi sau khi loại bỏ khoảng trắng là: " . $trimmedStr;
echo "<br>";
//b11
echo "b11: ";
$str = "Hello, World!";
$trimmedStr = ltrim($str, $str[0]);
echo "Chuỗi sau khi loại bỏ ký tự đầu tiên là: " . $trimmedStr;
echo "<br>";
//b12
echo "b12: ";
$str = "Hello, World!";
$trimmedStr = rtrim($str, $str[strlen($str) - 1]);
echo "Chuỗi sau khi loại bỏ ký tự cuối cùng là: " . $trimmedStr;
echo "<br>";
//b13
echo "b13: ";
$str = "2,1,6";
$explodedArr = explode(",", $str);
echo "Mảng sau khi tách chuỗi là: ";
print_r($explodedArr);
echo "<br>";
//b14
echo "b14: ";
$arr = array("2", "1", "6");
$implodedStr = implode(",", $arr);
echo "Chuỗi sau khi nối mảng là: " . $implodedStr;
echo "<br>";
//b15
echo "b15: ";
$str = "Hello";
$paddedStr = str_pad($str, strlen($str) + 10, " World!", STR_PAD_RIGHT);
echo "Chuỗi sau khi thêm vào là: " . $paddedStr;
echo "<br>";
//b16
 echo "b16: ";
 $str = "Hello, World!";
 $searchStr = "World!";
 $result = strrchr($str, $searchStr);
 if ($result !== false) {
     echo "Chuỗi kết thúc bằng chuỗi con.";
 } else {
     echo "Chuỗi không kết thúc bằng chuỗi con.";
 }
 echo "<br>";
//b17
echo "b17: ";
$str = "Hello, World!";
$searchStr = "World";
$result = strstr($str, $searchStr);
if ($result !== false) {
    echo "Chuỗi chứa chuỗi con.";
} else {
    echo "Chuỗi không chứa chuỗi con.";
}
echo "<br>";
//b18
echo "b18: ";
$str = "Hello, 123!";
$pattern = '/[^a-zA-Z0-9]+/';
$replacement = '-';
$newStr = preg_replace($pattern, $replacement, $str);
echo "Chuỗi mới sau khi thay thế là: " . $newStr;
echo "<br>";
//b19
echo "b19: ";
$str = "3010";
if (is_numeric($str) && strpos($str, '.') === false) {
    echo "Chuỗi là một số nguyên.";
} else {
    echo "Chuỗi không phải là số nguyên.";
}
echo "<br>";
//b20
echo "b20: ";
$email = "shoxiebn202@gmail.com";
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Chuỗi là một email hợp lệ.";
} else {
    echo "Chuỗi không phải là email hợp lệ.";
}

?>