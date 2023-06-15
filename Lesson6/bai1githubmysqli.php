<?php
// Bài 1:
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "huh"; 
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "huh");
// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
// 1. Tạo bảng "customers", gồm các trường id, name, email và phone.
$sql = "CREATE TABLE customers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phone VARCHAR(15) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Bảng 'customers' đã được tạo thành công";
} else {
    echo "Lỗi trong quá trình tạo bảng: " . $conn->error;
}
// 2. Thêm 5 khách hàng mới vào bảng "customers".
$sql = "INSERT INTO customers (name, email, phone) VALUES
    ('customer1', 'customer1@example.com', '8888888888'),
    ('customer2', 'customer2@example.com', '2222222222'),
    ('customer3', 'customer3@example.com', '5555555555'),
    ('customer4', 'customer4@example.com', '9999999999'),
    ('customer5', 'customer5@example.com', '1111111111')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm thành công 5 khách hàng mới";
} else {
    echo "Lỗi trong quá trình thêm dữ liệu: " . $conn->error;
}

// 3. Sửa thông tin của một khách hàng có id là 1.
$sql = "UPDATE customers SET name = 'customer11', email = 'customer11@example.com', phone = '77777777777' WHERE id = 1";

if ($conn->query($sql) === TRUE) {
    echo "Thông tin khách hàng đã được cập nhật thành công";
} else {
    echo "Lỗi trong quá trình cập nhật thông tin: " . $conn->error;
}

// 4. Xoá một khách hàng có id là 5.
$sql = "DELETE FROM customers WHERE id = 5";

if ($conn->query($sql) === TRUE) {
    echo "Khách hàng có id là 5 đã được xoá thành công";
} else {
    echo "Lỗi trong quá trình xoá khách hàng: " . $conn->error;
}

// 5. Lấy tất cả các khách hàng có email là "example@gmail.com".
$sql = "SELECT * FROM customers WHERE email = 'example@gmail.com'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Tên: " . $row["name"] . ", Email: " . $row["email"] . ", Điện thoại: " . $row["phone"] . "<br>";
    }
} else {
    echo "Không tìm thấy khách hàng nào có email là 'example@gmail.com'";
}

// 6. Tạo bảng "orders", gồm các trường id, customer_id, total_amount và order_date. (Thêm ràng buộc cho khoá ngoại delete cascade)
$sql = "CREATE TABLE orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id INT(6) UNSIGNED,
    total_amount DECIMAL(10,2),
    order_date DATE,
    CONSTRAINT fk_customer FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
)";

if ($conn->query($sql) === TRUE) {
    echo "Bảng 'orders' đã được tạo thành công";
} else {
    echo "Lỗi trong quá trình tạo bảng: " . $conn->error;
}

// 7. Thêm một đơn hàng mới vào bảng "orders" cho khách hàng có id là 3.
$sql = "INSERT INTO orders (customer_id, total_amount, order_date) VALUES (3, 100.50, '2023-06-15')";

if ($conn->query($sql) === TRUE) {
    echo "Đơn hàng mới đã được thêm thành công";
} else {
    echo "Lỗi trong quá trình thêm đơn hàng: " . $conn->error;
}

// 8. Lấy tất cả các đơn hàng của khách hàng có id là 3.
$sql = "SELECT * FROM orders WHERE customer_id = 3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . ", Customer ID: " . $row["customer_id"] . ", Tổng số tiền: " . $row["total_amount"] . ", Ngày đặt hàng: " . $row["order_date"] . "<br>";
    }
} else {
    echo "Không tìm thấy đơn hàng nào cho khách hàng có id là 3";
}

// 9. Lấy danh sách khách hàng và đơn hàng của họ, sử dụng câu lệnh JOIN.
$sql = "SELECT customers.id, customers.name, customers.email, orders.total_amount, orders.order_date
        FROM customers
        INNER JOIN orders ON customers.id = orders.customer_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID khách hàng: " . $row["id"] . ", Tên: " . $row["name"] . ", Email: " . $row["email"] . ", Tổng số tiền: " . $row["total_amount"] . ", Ngày đặt hàng: " . $row["order_date"] . "<br>";
    }
} else {
    echo "Không tìm thấy dữ liệu khách hàng và đơn hàng";
}

// 10. Lấy danh sách email của khách hàng, sử dụng hàm DISTINCT.
$sql = "SELECT DISTINCT email FROM customers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Email: " . $row["email"] . "<br>";
    }
} else {
    echo "Không tìm thấy email nào trong danh sách khách hàng";
}
$conn->close();

?>