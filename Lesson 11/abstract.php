<?php
// Bài 1
echo "Bài 1: ";
abstract class Shape {
  abstract public function calculateArea();
}

class Circle extends Shape {
  private $radius;
  public function __construct($radius) {
    $this->radius = $radius;
  }
  public function calculateArea() {
    return pi() * $this->radius * $this->radius;
  }
}

class Rectangle extends Shape {
  private $length;
  private $width;
  public function __construct($length, $width) {
    $this->length = $length;
    $this->width = $width;
  }
  public function calculateArea() {
    return $this->length * $this->width;
  }
}

$circle = new Circle(5);
echo "Diện tích của hình tròn là: " . $circle->calculateArea() . "<br>";
$rectangle = new Rectangle(10, 7);
echo "Diện tích của hình chữ nhật là: " . $rectangle->calculateArea() . "<br>";

//B2
echo "Bài 2: ";
abstract class Animal {
  abstract public function makeSound();
}
class Dog extends Animal {
  public function makeSound() {
    echo "Woof!" ."<br>";
  }
}
class Cat extends Animal {
  public function makeSound() {
    echo "Meow!". "<br>";
  }
}
$dog = new Dog();
$dog->makeSound(); 
$cat = new Cat();
$cat->makeSound(); 
// Bài 3:
echo " Bài 3: ";
abstract class Employee {
  protected $name;
  protected $salary;

  abstract public function getInformation();
}

class Manager extends Employee {
  private $department;

  public function __construct($name, $salary, $department) {
    $this->name = $name;
    $this->salary = $salary;
    $this->department = $department;
  }

  public function getInformation() {
    echo "Tên quản lý: " . $this->name . "<br>"; 
    echo "Mức lương: " . $this->salary . "<br>";
    echo "Phòng ban: " . $this->department . "<br>";
  }
}

class Staff extends Employee {
  private $position;

  public function __construct($name, $salary, $position) {
    $this->name = $name;
    $this->salary = $salary;
    $this->position = $position;
  }

  public function getInformation() {
    echo "Tên nhân viên: " . $this->name . "<br>";
    echo "Mức lương: " . $this->salary . "<br>";
    echo "Vị trí: " . $this->position . "<br>";
  }
}

$manager = new Manager("Lê Văn A", 20000000, "Kinh doanh");
$manager->getInformation();
$staff = new Staff("Nguyễn Thị B", 10000000, "Nhân viên kế toán");
$staff->getInformation();

//Bài 4:
echo "Bài 4: ";
abstract class Vehicle {
  abstract public function start();
}

class Car extends Vehicle {
  public function start() {
    echo "Bật động cơ" . "<br>";
  }
}

class Motorcycle extends Vehicle {
  public function start() {
    echo "Nhấn nút" . "<br>";
  }
}

$car = new Car();
$car->start();

$motorcycle = new Motorcycle();
$motorcycle->start();

// Bài 5:
echo "Bài 5: ";
abstract class Database {
  // Tạo các phương thức trừu tượng như "connect", "query" và "disconnect"
  abstract public function connect($host, $user, $password, $database);
  abstract public function query($sql);
  abstract public function disconnect();
}

// Tạo một lớp con "MySQLDatabase" kế thừa từ lớp Database
class MySQLDatabase extends Database {
  // Khai báo một thuộc tính riêng là "connection" (kết nối)
  private $connection;

  // Triển khai phương thức connect cho MySQL
  public function connect($host, $user, $password, $database) {
    // Kết nối đến cơ sở dữ liệu MySQL bằng hàm mysqli_connect
    $this->connection = mysqli_connect($host, $user, $password, $database);
    // Kiểm tra xem kết nối có thành công hay không
    if (!$this->connection) {
      // Nếu không thành công, in ra lỗi và thoát chương trình
      die("Lỗi kết nối: " . mysqli_connect_error());
    }
    // Nếu thành công, in ra thông báo
    echo "Kết nối thành công\n";
  }

  // Triển khai phương thức query cho MySQL
  public function query($sql) {
    // Thực hiện truy vấn SQL bằng hàm mysqli_query
    $result = mysqli_query($this->connection, $sql);
    // Kiểm tra xem truy vấn có thành công hay không
    if (!$result) {
      // Nếu không thành công, in ra lỗi và thoát chương trình
      die("Lỗi truy vấn: " . mysqli_error($this->connection));
    }
    // Nếu thành công, in ra số hàng bị ảnh hưởng
    echo "Số hàng bị ảnh hưởng: " . mysqli_affected_rows($this->connection) . "\n";
  }

  // Triển khai phương thức disconnect cho MySQL
  public function disconnect() {
    // Ngắt kết nối đến cơ sở dữ liệu MySQL bằng hàm mysqli_close
    mysqli_close($this->connection);
    // In ra thông báo
    echo "Ngắt kết nối". "<Br>";
  }
}

// Tạo một lớp con "PostgreSQLDatabase" kế thừa từ lớp Database
class PostgreSQLDatabase extends Database {
  // Khai báo một thuộc tính riêng là "connection" (kết nối)
  private $connection;

  // Triển khai phương thức connect cho PostgreSQL
  public function connect($host, $user, $password, $database) {
    // Kết nối đến cơ sở dữ liệu PostgreSQL bằng hàm pg_connect
    $this->connection = pg_connect("host=$host user=$user password=$password dbname=$database");
    // Kiểm tra xem kết nối có thành công hay không
    if (!$this->connection) {
      // Nếu không thành công, in ra lỗi và thoát chương trình
      die("Lỗi kết nối: " . pg_last_error());
    }
    // Nếu thành công, in ra thông báo
    echo "Kết nối thành công\n";
  }

  // Triển khai phương thức query cho PostgreSQL
  public function query($sql) {
    // Thực hiện truy vấn SQL bằng hàm pg_query
    $result = pg_query($this->connection, $sql);
    // Kiểm tra xem truy vấn có thành công hay không
    if (!$result) {
      // Nếu không thành công, in ra lỗi và thoát chương trình
      die("Lỗi truy vấn: " . pg_last_error($this->connection));
    }
    // Nếu thành công, in ra số hàng bị ảnh hưởng
    echo "Số hàng bị ảnh hưởng: " . pg_affected_rows($result) . "<br>";
  }

  // Triển khai phương thức disconnect cho PostgreSQL
  public function disconnect() {
    // Ngắt kết nối đến cơ sở dữ liệu PostgreSQL bằng hàm pg_close
    pg_close($this->connection);
    // In ra thông báo
    echo "Ngắt kết nối". "<br>";
  }
}

// Tạo một đối tượng của lớp MySQLDatabase
$mysql = new MySQLDatabase();
// Gọi phương thức connect của MySQL với các tham số tương ứng
$mysql->connect("localhost", "root", "", "test");
// Gọi phương thức query của MySQL với một câu lệnh SQL đơn giản
$mysql->query("INSERT INTO users (name, email) VALUES ('Lê Văn A', 'levana@gmail.com')");
// Gọi phương thức disconnect của MySQL
$mysql->disconnect();

// Tạo một đối tượng của lớp PostgreSQLDatabase
$postgresql = new PostgreSQLDatabase();
// Gọi phương thức connect của PostgreSQL với các tham số tương ứng
$postgresql->connect("localhost", "postgres", "", "test");
// Gọi phương thức query của PostgreSQL với một câu lệnh SQL đơn giản
$postgresql->query("INSERT INTO users (name, email) VALUES ('Nguyễn Thị B', 'nguyenthb@gmail.com')");
// Gọi phương thức disconnect của PostgreSQL
$postgresql->disconnect();


?>


