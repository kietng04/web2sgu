<?php
// Kết nối đến cơ sở dữ liệu
$db = new mysqli('localhost', 'trungky@gmail.com', '123456', 'web2sgu');

// Kiểm tra kết nối
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Lấy dữ liệu từ form
$maSize = $_POST['masize'];
$tenSize = $_POST['tensize'];
$dinhLuongSize = $_POST['dinhluongsize'];

// Tạo câu truy vấn SQL
$sql = "INSERT INTO SizeSanPham (MaSize, TenSize, DinhLuongSize) VALUES (?, ?, ?)";

// Tạo prepared statement
$stmt = $db->prepare($sql);

// Kiểm tra xem statement có được tạo thành công không
if ($stmt === false) {
    die("Error: Could not prepare SQL statement");
}

// Bind parameters
$stmt->bind_param("sss", $maSize, $tenSize, $dinhLuongSize);

// Thực thi câu truy vấn
if ($stmt->execute() === true) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

// Đóng kết nối
$db->close();
?>