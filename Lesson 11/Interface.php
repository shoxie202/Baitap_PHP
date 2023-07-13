<?php
echo "Bài 1: ";
interface Resizable {
  public function resize($scale);
}
class Rectangle implements Resizable {
  private $length;
  private $width;
  public function __construct($length, $width) {
    $this->length = $length;
    $this->width = $width;
  }

  public function resize($scale) {
    $this->length *= $scale;
    $this->width *= $scale;
  }

  public function printSize() {
    echo "Chiều dài: " . $this->length . "\n";
    echo "Chiều rộng: " . $this->width . "\n";
  }
}

$rect = new Rectangle(10, 5);
$rect->printSize();
$rect->resize(2);
$rect->printSize();
echo "<br>";
// Bài 3
echo "Bài 3: ";
interface Drawable {
    public function draw();
}
class Circle1 implements Drawable {
    public function draw() {
        return "Drawing a circle:...";
    }
}
class Square1 implements Drawable {
    public function draw() {
        return "Drawing a square:...";
    }
}
$less8_1 = new Circle1();
$less8_2 = new Square1();
$draws = [$less8_1, $less8_2];
foreach($draws as $draw)
echo $draw->draw(). "<br>";
// Bài 4:
echo "Bài 4: ";
interface Sortable {
    public function getSort();
}
class ArraySorter implements Sortable {
    protected $arr;
    public function __construct($arr) {
        $this->arr = $arr;
    }
    public function getSort() {
        sort($this->arr);
        return $this->arr;
    }
}
class LinkedListSorter implements Sortable {
    protected $arr;
    public function __construct($arr) {
        $this->arr = $arr;
    }
    public function getSort() {
        sort($this->arr);
        return $this->arr;
    }
}
$arr1 = [5,6,4,1];
$arr2 = ["Volvo", "BMW", "Toyota"];
$less9_1 = new ArraySorter($arr1);
$less9_2 = new LinkedListSorter($arr2);
$result1 = $less9_1->getSort();
$result2 = $less9_2->getSort();
echo implode(", ", $result1). "<br>";
echo implode(", ", $result2). "<br>";
?>
