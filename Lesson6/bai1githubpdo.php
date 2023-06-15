<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "huh";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Tạo bảng "customers"
    $sql = "
    CREATE TABLE customers (
      id INT PRIMARY KEY AUTO_INCREMENT,
      name VARCHAR(50),
      email VARCHAR(50),
      phone VARCHAR(20)
    )";
    $conn->exec($sql);

    // 2. Thêm 5 khách hàng mới vào bảng "customers"
    $sql = "INSERT INTO customers (name, email, phone) VALUES
            ('Customer 1', 'customer1@example.com', '888888888'),
            ('Customer 2', 'customer2@example.com', '222222222'),
            ('Customer 3', 'customer3@example.com', '555555555'),
            ('Customer 4', 'customer4@example.com', '111111111'),
            ('Customer 5', 'customer5@example.com', '999999999')";
    $conn->exec($sql);

    // 3. Sửa thông tin của một khách hàng có id là 1
    $sql = "UPDATE customers SET name = 'Updated Name' WHERE id = 1";
    $conn->exec($sql);

    // 4. Xóa một khách hàng có id là 5
    $sql = "DELETE FROM customers WHERE id = 5";
    $conn->exec($sql);

    // 5. Lấy tất cả các khách hàng có email là "example@gmail.com"
    $sql = "SELECT * FROM customers WHERE email = 'example@gmail.com'";
    $result = $conn->query($sql);
    $customers = $result->fetchAll(PDO::FETCH_ASSOC);
    print_r($customers);

    // 6. Tạo bảng "orders"
    $sql = "
    CREATE TABLE orders (
      id INT PRIMARY KEY AUTO_INCREMENT,
      customer_id INT,
      total_amount DECIMAL(10, 2),
      order_date DATE,
      FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
    )";
    $conn->exec($sql);

    // 7. Thêm một đơn hàng mới vào bảng "orders" cho khách hàng có id là 3
    $sql = "INSERT INTO orders (customer_id, total_amount, order_date) VALUES (3, 100.00, NOW())";
    $conn->exec($sql);

    // 8. Lấy tất cả các đơn hàng của khách hàng có id là 3
    $sql = "SELECT * FROM orders WHERE customer_id = 3";
    $result = $conn->query($sql);
    $orders = $result->fetchAll(PDO::FETCH_ASSOC);
    print_r($orders);

    // 9. Lấy danh sách khách hàng và đơn hàng của họ, sử dụng câu lệnh JOIN
    $sql = "SELECT customers.name, orders.total_amount FROM customers JOIN orders ON customers.id = orders.customer_id";
    $result = $conn->query($sql);
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    print_r($data);

    // 10. Lấy danh sách email của khách
    $sql = "SELECT DISTINCT email FROM customers";
    $result = $conn->query($sql);
    $emails = $result->fetchAll(PDO::FETCH_COLUMN);
    print_r($emails);

} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

$conn = null;
?>