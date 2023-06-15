<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "huh";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Tạo các quan hệ và khai báo các khóa chính, khóa ngoại của quan hệ

    $sql = "
    CREATE TABLE KHACHHANG (
      MAKH INT PRIMARY KEY,
      HOTEN VARCHAR(50),
      DCHI VARCHAR(100),
      SODT VARCHAR(20),
      NGSINH DATE,
      DOANHSO DECIMAL(10, 2),
      NGDK DATE,
      LOAIKH TINYINT
    );

    CREATE TABLE NHANVIEN (
      MANV INT PRIMARY KEY,
      HOTEN VARCHAR(50),
      NGVL DATE,
      SODT VARCHAR(20)
    );

    CREATE TABLE SANPHAM (
      MASP INT PRIMARY KEY,
      TENSP VARCHAR(50),
      DVT VARCHAR(20),
      NUOCSX VARCHAR(50),
      GIA DECIMAL(10, 2),
      GHICHU VARCHAR(20)
    );

    CREATE TABLE HOADON (
      SOHD INT PRIMARY KEY,
      NGHD DATE,
      MAKH INT,
      MANV INT,
      TRIGIA DECIMAL(10, 2),
      FOREIGN KEY (MAKH) REFERENCES KHACHHANG(MAKH),
      FOREIGN KEY (MANV) REFERENCES NHANVIEN(MANV)
    );

    CREATE TABLE CTHD (
      SOHD INT,
      MASP INT,
      SL INT,
      PRIMARY KEY (SOHD, MASP),
      FOREIGN KEY (SOHD) REFERENCES HOADON(SOHD),
      FOREIGN KEY (MASP) REFERENCES SANPHAM(MASP)
    );
    ";

    $conn->exec($sql);

    // 2. Thêm vào thuộc tính GHICHU có kiểu dữ liệu varchar(20) cho quan hệ SANPHAM

    $sql = "ALTER TABLE SANPHAM ADD COLUMN GHICHU VARCHAR(20)";
    $conn->exec($sql);

    // 3. Thêm vào thuộc tính LOAIKH có kiểu dữ liệu là tinyint cho quan hệ KHACHHANG

    $sql = "ALTER TABLE KHACHHANG ADD COLUMN LOAIKH TINYINT";
    $conn->exec($sql);

    // 4. Cập nhật tên “Nguyễn Văn B” cho dữ liệu Khách Hàng có mã là KH01

    $sql = "UPDATE KHACHHANG SET HOTEN = 'Nguyễn Văn B' WHERE MAKH = 'KH01'";
    $conn->exec($sql);

    // 5. Cập nhật tên “Nguyễn Văn Hoan” cho dữ liệu Khách Hàng có mã là KH09 và năm đăng ký là 2007

    $sql = "UPDATE KHACHHANG SET HOTEN = 'Nguyễn Văn Hoan' WHERE MAKH = 'KH09' AND YEAR(NGDK) = 2007";
    $conn->exec($sql);
    
    // 6. Sửa kiểu dữ liệu của thuộc tính GHICHU trong quan hệ SANPHAM thành varchar(100).

    $sql = "ALTER TABLE SANPHAM MODIFY COLUMN GHICHU VARCHAR(100)";
    $conn->exec($sql);

    // 7. Xóa thuộc tính GHICHU trong quan hệ SANPHAM.

    $sql = "ALTER TABLE SANPHAM DROP COLUMN GHICHU";
    $conn->exec($sql);

    // 8. Xóa tất cả dữ liệu khách hàng có năm sinh 1971.
    $sql = "DELETE FROM KHACHHANG WHERE YEAR(NGSINH) = 1971";
    $conn->exec($sql);

    // 9. Xóa tất cả dữ liệu khách hàng có năm sinh 1971 và năm đăng ký 2006.
    $sql = "DELETE FROM KHACHHANG WHERE YEAR(NGSINH) = 1971 AND YEAR(NGDK) = 2006";
    $conn->exec($sql);

    // 10. Xóa tất cả hóa đơn có mã KH = KH01.
    $sql = "DELETE FROM HOADON WHERE MAKH = 'KH01'";
    $conn->exec($sql);
} catch(PDOException $e) {
    echo "Lỗi: " . $e->getMessage();
}

?>
