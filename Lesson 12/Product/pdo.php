<?php
// Định nghĩa một lớp abstract connect để kết nối đến cơ sở dữ liệu
abstract class ConnectDB {
    // Các biến lưu trữ thông tin cấu hình cơ sở dữ liệu
    protected $DB_TYPE;
    protected $DB_HOST;
    protected $DB_NAME;
    protected $USER;
    protected $PW;
    protected $ConnectDB;

    // Hàm khởi tạo, cấu hình thông tin cơ sở dữ liệu và thực hiện kết nối
    public function __construct() {
        $this->DB_TYPE = 'mysql';
        $this->DB_HOST = 'localhost';
        $this->DB_NAME = 'huh';
        $this->USER = 'root';
        $this->PW = '';
        $this->ConnectDB = $this->conn(); // Thực hiện kết nối và lưu kết nối vào biến $ConnectDB
    }

    // Hàm thực hiện kết nối đến cơ sở dữ liệu
    public function conn() {
        try {
            // Sử dụng PDO để tạo kết nối
            $conn = new PDO("$this->DB_TYPE:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->USER, $this->PW);
            // Thiết lập chế độ trả về mảng kết hợp cho kết quả truy vấn
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn; // Trả về đối tượng kết nối
        } catch (Exception $e) {
            die("ConnectDB failed: " . $e->getMessage()); // Nếu có lỗi thì dừng chương trình và in thông báo lỗi
        }
    }

    // Hàm chuẩn bị truy vấn SQL
    public function prepareSQL($sql) {
        return $this->ConnectDB->prepare($sql); // Sử dụng kết nối đã tạo trước đó để chuẩn bị truy vấn SQL và trả về đối tượng PreparedStatement
    }
}

// Lớp Query kế thừa từ lớp ConnectDB, dùng để thực hiện các truy vấn cơ sở dữ liệu
class Query extends ConnectDB {
    // Phương thức thực hiện lấy tất cả dữ liệu từ bảng 'products'
    public function all() {
        $sql = "SELECT * FROM products";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll(); // Trả về một mảng chứa tất cả dữ liệu của bảng 'products'
    }

    // Phương thức thực hiện thêm dữ liệu vào bảng 'products'
    public function create($data) {
        $sql = "INSERT INTO products (name, price, category_id) VALUES (:name, :price, :ca_id)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data); // Thực hiện truy vấn INSERT với dữ liệu được truyền vào
    }

    // Phương thức thực hiện xóa dữ liệu từ bảng 'products'
    public function delete($data) {
        $sql = "DELETE FROM products where id = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data); // Thực hiện truy vấn DELETE với dữ liệu được truyền vào
    }

    // Phương thức thực hiện cập nhật dữ liệu trong bảng 'products'
    public function update($name, $price, $ca_id, $id) {
        $sql = "UPDATE products SET name= '$name', price = '$price', category_id = '$ca_id' WHERE id = $id LIMIT 1";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute(); // Thực hiện truy vấn UPDATE
    }

    // Phương thức thực hiện lấy dữ liệu từ bảng 'products' với điều kiện id
    public function select($data) {
        $sql = "SELECT * FROM products WHERE id = $data";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll(); // Trả về một mảng chứa dữ liệu của bản ghi có id tương ứng
    }
}
