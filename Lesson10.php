<?php
//Bai 2
echo "Bài 2: ";
class TowdPoint {
    protected $Xa;
    protected $Ya;
    protected $Xb;
    protected $Yb;
    public function __construct($Xa, $Ya, $Xb, $Yb)
    {
        $this->Xa = $Xa;
        $this->Ya = $Ya;
        $this->Xb = $Xb;
        $this->Yb = $Yb;
    }
    public function calSpace() {
        return sqrt(($this->Xb - $this->Xa)*($this->Xb - $this->Xa) + ($this->Yb - $this->Ya)* ($this->Yb - $this->Ya));
    }

}

$Xa = 13;
$Ya = 3;
$Xb = 12;
$Yb = 5;
$exe2 = new TowdPoint($Xa, $Ya, $Xb, $Yb);
echo "Distance: ". $exe2->calSpace() . "\n";
echo "<br />";

//Bai 3
echo "Bài 3: ";
class IntegerArray {
    private $array;

    public function __construct($array) {
        $this->array = $array;
    }

    public function calculateSum() {
        return array_sum($this->array);
    }

    public function calculateAverage() {
        $sum = $this->calculateSum();
        $count = count($this->array);
        return $sum / $count;
    }

    public function findMax() {
        return max($this->array);
    }
}
$array = [1,2,3,4];
$exe3 = new IntegerArray($array);
echo "Total: ". $exe3->calculateSum(). "<br />";
echo "Average: ". $exe3->calculateAverage(). "<br />";
echo "The largest element: ". $exe3->findMax();
echo "<br />";

//Bai 4
echo "Bài 4: ";
class Clock {
    private $hour;
    private $minute;
    private $second;

    public function __construct($hour, $minute, $second) {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }

    public function displayTime() {
        $formattedTime = sprintf("%02d:%02d:%02d", $this->hour, $this->minute, $this->second);
        return $formattedTime;
    }

    public function increaseSecond() {
        $this->second++;
        if ($this->second >= 60) {
            $this->second = 0;
            $this->minute++;
            if ($this->minute >= 60) {
                $this->minute = 0;
                $this->hour++;
                if ($this->hour >= 24) {
                    $this->hour = 0;
                }
            }
        }
    }
}

$hour = 10;
$minute = 10;
$second = 10;
$exe4 = new Clock($hour, $minute, $second);
echo "Time is: ". $exe4->displayTime();
$exe4->increaseSecond();
echo "<br />";
echo "Time after increase 1 second is: ". $exe4->displayTime();
echo "<br />";

//Bai 5
echo "Bài 5: ";
class Student {
    private $studentId;
    private $fullName;

    public function __construct($studentId, $fullName) {
        $this->studentId = $studentId;
        $this->fullName = $fullName;
    }

    public function getStudentId() {
        return $this->studentId;
    }

    public function getFullName() {
        return $this->fullName;
    }
}

$studentId = 1;
$fullName = ("Nguyen Van A");
$exe5 = new Student($studentId, $fullName);
echo "ID: ". $exe5->getStudentId(). "/ Full name: ". $exe5->getFullName(). "<br />";

//Bai 6
echo "Bài 6: ";
class Car {
    private $brand;
    private $color;
    private $year;

    public function __construct($brand, $color, $year) {
        $this->brand = $brand;
        $this->color = $color;
        $this->year = $year;
    }

    public function displayInfo() {
        echo "Brand: " . $this->brand . "<br>";
        echo "Color: " . $this->color . "<br>";
        echo "Year: " . $this->year . "<br>";
    }
}
$brand = ("Toyota");
$color = ("Blue");
$year = 2010;
$exe6 = new Car($brand, $color, $year);
echo "Car information is: <br>";
echo $exe6->displayInfo();

//Bai 7
echo "Bài 7: ";
class Fraction {
    private $numerator1;
    private $denominator1;
    private $numerator2;
    private $denominator2;

    public function __construct($numerator1, $denominator1, $numerator2, $denominator2) {
        $this->numerator1 = $numerator1;
        $this->denominator1 = $denominator1;
        $this->numerator2 = $numerator2;
        $this->denominator2 = $denominator2;
    }

    public function add() {
        $resultNumerator = ($this->numerator1 * $this->denominator2) + ($this->numerator2 * $this->denominator1);
        $resultDenominator = $this->denominator1 * $this->denominator2;
        return $resultNumerator. "/". $resultDenominator;
    }

    public function subtract() {
        $resultNumerator = ($this->numerator1 * $this->denominator2) - ($this->numerator2 * $this->denominator1);
        $resultDenominator = $this->denominator1 * $this->denominator2;
        return $resultNumerator. "/". $resultDenominator;
    }

    public function multiply() {
        $resultNumerator = $this->numerator1 * $this->numerator2;
        $resultDenominator = $this->denominator1 * $this->denominator2;
        return $resultNumerator. "/". $resultDenominator;
    }

    public function divide() {
        $resultNumerator = $this->numerator1 * $this->denominator2;
        $resultDenominator = $this->denominator1 * $this->numerator2;
        return $resultNumerator. "/". $resultDenominator;
    }
}
$numerator1 = 1;
$denominator1 = 2;
$numerator2 = 2;
$denominator2 = 3;
$exe7 = new Fraction($numerator1, $denominator1, $numerator2, $denominator2);
echo "Add is: ". $exe7->add(). "<br>";
echo "Subtract is: ". $exe7->subtract(). "<br>";
echo "Multiply is: ". $exe7->multiply(). "<br>";
echo "Divide is: ". $exe7->divide(). "<br>";

//Bai 8
echo "Bài 8: ";
class Person {
    private $name;
    private $age;
    private $address;

    public function __construct($name, $age, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Age: " . $this->age . "<br>";
        echo "Address: " . $this->address . "<br>";
    }
}
$name = ("Nguyen Van A");
$age = 22;
$address = ("123 Ha Noi");
$exe8 = new Person($name, $age, $address);
echo "Information is: <br>";
echo $exe8->displayInfo();

//Bai 9
echo "Bài 9: ";
class Product {
    private $name;
    private $price;
    private $description;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
    }

    public function displayInfo() {
        echo "Name: " . $this->name . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Description: " . $this->description . "<br>";
    }
}
$name = ("Socola");
$price = 15.000;
$description = ("Dark chocolate 90%");
$exe9 = new Product($name, $price, $description);
echo "Product information is: <br>";
echo $exe9->displayInfo();

//Bai 10
echo "Bài 10: ";
class HotelReservation {
    private $name;
    private $checkInDate;
    private $numberOfNights;

    public function __construct($name, $checkInDate, $numberOfNights) {
        $this->name = $name;
        $this->checkInDate = $checkInDate;
        $this->numberOfNights = $numberOfNights;
    }

    public function calculateTotalAmount($roomPrice) {
        return $roomPrice * $this->numberOfNights;
    }
}
$name = ("Room 101");
$checkInDate = ("2023/07/03");
$numberOfNights = 5;
$exe10 = new HotelReservation($name, $checkInDate, $numberOfNights);
echo "Total = ". $exe10->calculateTotalAmount(15,000);
?>