<?php
//b1: Viết chương trình PHP để kiểm tra xem một số có phải là số chẵn hay không.
echo "B1: ";
function isEven($number) {
    if ($number % 2 == 0) {
        return true;
    } else {
        return false;
    }
}

$number = 30;
if (isEven($number)) {
    echo $number . " là số chẵn.";
} else {
    echo $number . " không là số chẵn.";
}
echo "<br>";
//b2: Viết chương trình PHP để tính tổng của các số từ 1 đến n.
echo "B2: ";
function calculateSum($n) {
    $sum = 0;
    for ($i = 1; $i <= $n; $i++) {
        $sum += $i;
    }
    return $sum;
}

$n = 30;
$sum = calculateSum($n);
echo "Tổng các số từ 1 đến " . $n . " là: " . $sum;
echo "<br>";
//b3: Viết chương trình PHP để in ra bảng cửu chương từ 1 đến 10.
echo "B3: ";
for ($i = 1; $i <= 10; $i++) {
    for ($j = 1; $j <= 10; $j++) {
        echo $i . " x " . $j . " = " . ($i * $j) . "<br>";
    }
    echo "<br>";
}
//b4: Viết chương trình PHP để kiểm tra xem một chuỗi có chứa một từ cụ thể hay không.
echo "B4: ";
function checkStringContainsWord($string, $word) {
   $string = strtolower($string);
   $word = strtolower($word);

   if (strpos($string, $word) !== false) {
       return true;
   } else {
       return false;
   }
}

$string = "Truong Dai hoc Thuong Mai.";
$word = "Thuong Mai";
if (checkStringContainsWord($string, $word)) {
   echo "Chuỗi chứa từ '" . $word . "'.";
} else {
   echo "Chuỗi không chứa từ '" . $word . "'.";
}
echo "<br>";
//b5: Viết chương trình PHP để tìm giá trị lớn nhất và nhỏ nhất trong một mảng.
echo "B5: ";
function findMinMax($array) {
    $min = $array[0];
    $max = $array[0];

    foreach ($array as $value) {
        if ($value < $min) {
            $min = $value;
        }
        if ($value > $max) {
            $max = $value;
        }
    }

    return array("min" => $min, "max" => $max);
}

$array = array(51, 13, 29, 12, 77);
$result = findMinMax($array);

echo "Giá trị nhỏ nhất trong mảng là: " . $result["min"] . "<br>";
echo "Giá trị lớn nhất trong mảng là: " . $result["max"];
echo "<br>";
//b6: Viết chương trình PHP để sắp xếp một mảng theo thứ tự tăng dần.
echo "B6: ";
function sortArray($array) {
   sort($array);
   return $array;
}

$array = array(52, 13, 29, 22, 17);
$sortedArray = sortArray($array);

echo "Mảng đã được sắp xếp theo thứ tự tăng dần là: ";
foreach ($sortedArray as $value) {
echo $value . " ";
}
echo "<br>";
//b7: Viết chương trình PHP để tính giai thừa của một số nguyên dương.
echo "B7: ";
function calculateFactorial($n) {
   if ($n == 0 || $n == 1) {
       return 1;
   } else {
       return $n * calculateFactorial($n - 1);
   }
}

$n = 10;
$factorial = calculateFactorial($n);
echo "Giai thừa của " . $n . " là: " . $factorial;
echo "<br>";
//b8: Viết chương trình PHP để tìm số nguyên tố trong một khoảng cho trước.
echo "B8: ";
function isPrime($number) {
    if ($number <= 1) {
        return false;
    }
    for ($i = 2; $i <= sqrt($number); $i++) {
        if ($number % $i == 0) {
            return false;
        }
    }
    return true;
}

$lowerLimit = 1;
$upperLimit = 10;

echo "Các số nguyên tố trong khoảng từ " . $lowerLimit . " đến " . $upperLimit . " là: ";
for ($i = $lowerLimit; $i <= $upperLimit; $i++) {
    if (isPrime($i)) {
        echo $i . " ";
    }
}
echo "<br>";
//b9: Viết chương trình PHP để tính tổng của các số trong một mảng.
echo "B9: ";
function calculateArraySum($array) {
    $sum = 0;
    foreach ($array as $value) {
        $sum += $value;
    }
    return $sum;
}
$array = array(21, 14, 26, 81, 10);
$sum = calculateArraySum($array);
echo "Tổng các số trong mảng là: " . $sum;
echo "<Br>";
//b10: Viết chương trình PHP để in ra các số Fibonacci trong một khoảng cho trước.
echo "B10: ";
function inSoFibonacci($n) {
    $fibonacci = [0, 1];
    for ($i = 2; $i <= $n; $i++) {
        $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    }
    return $fibonacci;
}

$n = 10;
$fibonacciNumbers = inSoFibonacci($n);
echo "Các số Fibonacci trong khoảng từ 0 đến $n là: " . implode(", ", $fibonacciNumbers);
echo "<br>";
//b11: Viết chương trình PHP để kiểm tra xem một số có phải là số Armstrong hay không.
echo "B11: ";
function isArmstrong($number) {
    $sum = 0;
    $temp = $number;
    $digits = strlen($number);

    while ($temp != 0) {
        $remainder = $temp % 10;
        $sum += pow($remainder, $digits);
        $temp = (int)($temp / 10);
    }

    if ($sum == $number) {
        return true;
    } else {
        return false;
    }
}

$number = 3010;
if (isArmstrong($number)) {
    echo $number . " là số Armstrong.";
   } else {
   echo $number . " không là số Armstrong.";
   }
   echo "<br>";
//b12: Viết chương trình PHP để chèn một phần tử vào một mảng ở vị trí bất kỳ.
echo "B12: ";
function insertElement($array, $element, $position) {
    array_splice($array, $position, 0, $element);
    return $array;
}

$array = array(1, 2, 3, 4, 5);
$element = 10;
$position = 2;
$newArray = insertElement($array, $element, $position);

echo "Mảng mới sau khi chèn phần tử " . $element . " vào vị trí " . $position . " là: ";
foreach ($newArray as $value) {
    echo $value . " ";
}
echo "<Br>";
//b13: Viết chương trình PHP để loại bỏ các phần tử trùng lặp trong một mảng.
echo "B13: ";
function removeDuplicates($array) {
    $array = array_unique($array);
    return $array;
}

$array = array(1, 2, 3, 2, 4, 3, 5);
$uniqueArray = removeDuplicates($array);

echo "Mảng sau khi loại bỏ các phần tử trùng lặp là: ";
foreach ($uniqueArray as $value) {
    echo $value . " ";
}
echo "<Br>";
//b14: Viết chương trình PHP để tìm vị trí của một phần tử trong một mảng.
echo "B14: ";
function findElementPosition($array, $element) {
   $positions = array_keys($array, $element);
   return $positions;
}

$array = array(21, 30, 6, 8, 4, 10);
$element = 4;
$positions = findElementPosition($array, $element);

echo "Vị trí của phần tử " . $element . " trong mảng là: ";
foreach ($positions as $position) {
   echo $position . " ";
}
echo "<br>";
//b15: Viết chương trình PHP để đảo ngược một chuỗi.
echo "B15: ";
function reverseString($string) {
   $reversedString = strrev($string);
   return $reversedString;
}

$string = "Truong Dai hoc Thuong Mai";
$reversedString = reverseString($string);

echo "Chuỗi đảo ngược là: " . $reversedString;
echo "<br>";

//b16: Viết chương trình PHP để tính số lượng phần tử trong một mảng.
echo "B16: ";
function countElements($array) {
   $count = count($array);
   return $count;
}

$array = array(1, 2, 3, 4, 5);
$count = countElements($array);
echo "Số lượng phần tử trong mảng là: " . $count;
echo "<Br>";
//b17: Viết chương trình PHP để kiểm tra xem một chuỗi có phải là chuỗi Palindrome hay không.
echo "B17: ";
function isPalindrome($string) {
   $reversedString = strrev($string);
   if ($string == $reversedString) {
       return true;
   } else {
       return false;
   }
}

$string = "radar";
if (isPalindrome($string)) {
   echo $string . " là chuỗi Palindrome.";
} else {
   echo $string . " không là chuỗi Palindrome.";
}
echo "<BR>";
//b18: Viết chương trình PHP để đếm số lần xuất hiện của một phần tử trong một mảng.
echo "B18: ";
function countOccurrences($array, $element) {
   $count = 0;
   foreach ($array as $value) {
       if ($value == $element) {
           $count++;
       }
   }
   return $count;
}

$array = array(1, 2, 3, 2, 4, 2, 5);
$element = 2;
$occurrences = countOccurrences($array, $element);

echo "Số lần xuất hiện của phần tử " . $element . " trong mảng là: " . $occurrences;
echo "<br>";
//b19: Viết chương trình PHP để sắp xếp một mảng theo thứ tự giảm dần.
echo "B19: ";
function sortArrayDescending($array) {
   rsort($array);
   return $array;
}

$array = array(5, 3, 9, 2, 7);
$sortedArray = sortArrayDescending($array);

echo "Mảng đã được sắp xếp theo thứ tự giảm dần là: ";
foreach ($sortedArray as $value) {
   echo $value . " ";
}
echo "<br>";
//b20: Viết chương trình PHP để thêm một phần tử vào đầu hoặc cuối của một mảng.
echo "B20: ";
function addElement($array, $element, $position) {
   if ($position == "start") {
       array_unshift($array, $element);
   } elseif ($position == "end") {
       array_push($array, $element);
   }
   return $array;
}

$array = array(1, 2, 3, 4, 5);
$element = 10;
$position = "start";
$newArray = addElement($array, $element, $position);

echo "Mảng mới sau khi thêm phần tử " . $element . " vào vị trí " . $position . " là: ";
foreach ($newArray as $value) {
   echo $value . " ";
}
echo "<br>";
//b21: Viết chương trình PHP để tìm số lớn thứ hai trong một mảng.
echo "B21: ";
function findSecondLargest($array) {
   $max = max($array);
   $secondLargest = null;

   foreach ($array as $value) {
       if ($value < $max) {
           if ($secondLargest === null || $value > $secondLargest) {
               $secondLargest = $value;
           }
       }
   }

   return $secondLargest;
}

$array = array(51, 82, 12, 10, 33);
$secondLargest = findSecondLargest($array);

echo "Số lớn thứ hai trong mảng là: " . $secondLargest;
echo "<br>";
//b22: Viết chương trình PHP để tìm ước số chung lớn nhất và bội số chung nhỏ nhất của hai số nguyên dương.
echo "B22: ";
function findGCD($a, $b) {
   while ($b != 0) {
       $temp = $b;
       $b = $a % $b;
       $a = $temp;
   }
   return $a;
}

function findLCM($a, $b) {
   $gcd = findGCD($a, $b);
   $lcm = ($a * $b) / $gcd;
   return $lcm;
}

$number1 = 30;
$number2 = 10;
$number3 = 02;

$gcd = findGCD($number1, $number2);
$lcm = findLCM($number2, $number3);

echo "Ước số chung lớn nhất của " . $number1 . ", " . $number2 . " và " . $number3 . " là: " . $gcd;
echo "<br>";
echo "Bội số chung nhỏ nhất của " . $number1 . ", " . $number2 . " và " . $number3 . " là: " . $lcm;
echo "<br>";
//b23: Viết chương trình PHP để kiểm tra xem một số có phải là số hoàn hảo hay không.
echo "B23: ";
function isPerfectNumber($number) {
   $sum = 0;
   for ($i = 1; $i <= $number / 2; $i++) {
       if ($number % $i == 0) {
           $sum += $i;
       }
   }
   if ($sum == $number) {
       return true;
   } else {
       return false;
   }
}

$number = 3010;
if (isPerfectNumber($number)) {
   echo $number . " là số hoàn hảo.";
} else {
   echo $number . " không là số hoàn hảo.";
}
echo "<br>";
//b24: Viết chương trình PHP để tìm số lẻ lớn nhất trong một mảng.
echo "B24: ";
function findLargestOdd($array) {
   $largestOdd = null;
   foreach ($array as $value) {
       if ($value % 2 != 0) {
           if ($largestOdd === null || $value > $largestOdd) {
               $largestOdd = $value;
           }
       }
   }
   return $largestOdd;
}

$array = array(21, 24, 76, 55, 10, 29, 61);
$largestOdd = findLargestOdd($array);

echo "Số lẻ lớn nhất trong mảng là: " . $largestOdd;
echo "<br>";
//b25: Viết chương trình PHP để kiểm tra xem một số có phải là số nguyên tố hay không.
echo "B25: ";
function KTsonto($number) {
   if ($number <= 1) {
       return false;
   }
   for ($i = 2; $i <= sqrt($number); $i++) {
       if ($number % $i == 0) {
           return false;
       }
   }
   return true;
}

$number = 30;
if (KTsonto($number)) {
   echo $number . " là số nguyên tố.";
} else {
   echo $number . " không là số nguyên tố.";
}
echo "<br>";
//b26: Viết chương trình PHP để tìm số dương lớn nhất trong một mảng.
echo "B26: ";
function findLargestPositive($array) {
   $largestPositive = null;
   foreach ($array as $value) {
       if ($value > 0) {
           if ($largestPositive === null || $value > $largestPositive) {
               $largestPositive = $value;
           }
       }
   }
   return $largestPositive;
}

$array = array(-99, 14, 41, 25, -10, 99, 66);
$largestPositive = findLargestPositive($array);

echo "Số dương lớn nhất trong mảng là: " . $largestPositive;
echo "<br>";
//b27: Viết chương trình PHP để tìm số âm lớn nhất trong một mảng.
echo "B27: ";
function findLargestNegative($array) {
   $largestNegative = null;
   foreach ($array as $value) {
       if ($value < 0) {
           if ($largestNegative === null || $value > $largestNegative) {
               $largestNegative = $value;
           }
       }
   }
   return $largestNegative;
}

$array = array(-22, 41, -77, 25, -99, 9, -66);
$largestNegative = findLargestNegative($array);

echo "Số âm lớn nhất trong mảng là: " . $largestNegative;
echo "<br>";
//b28: Vi:ết chương trình PHP để tính tổng các số lẻ từ 1 đến n.
echo "B28: ";
function sumOfOddNumbers($n) {
   $sum = 0;
   for ($i = 1; $i <= $n; $i++) {
       if ($i % 2 != 0) {
           $sum += $i;
       }
   }
   return $sum;
}

$n = 10;
$sum = sumOfOddNumbers($n);

echo "Tổng các số lẻ từ 1 đến " . $n . " là: " . $sum;
echo "<br>";
//b29: Viết chương trình PHP để tìm số chính phương trong một khoảng cho trước.
echo "B29: ";
function isPerfectSquare($number) {
   $sqrt = sqrt($number);
   return ($sqrt - floor($sqrt)) == 0;
}

$start = 1;
$end = 10;

echo "Các số chính phương trong khoảng từ " . $start . " đến " . $end . " là: ";
for ($i = $start; $i <= $end; $i++) {
   if (isPerfectSquare($i)) {
       echo $i . " ";
   }
}
echo "<br>";
//b30: Viết chương trình PHP để kiểm tra xem một chuỗi có phải là chuỗi con của một chuỗi khác hay không. 
echo "B30: ";
function isSubstring($string, $substring) {
   if (strpos($string, $substring) !== false) {
       return true;
   } else {
       return false;
   }
}

$string = "Hello, world!";
$substring = "world";

if (isSubstring($string, $substring)) {
   echo "'" . $substring . "' là một chuỗi con của '" . $string . "'.";
} else {
   echo "'" . $substring . "' không là một chuỗi con của '" . $string . "'.";
}

?>