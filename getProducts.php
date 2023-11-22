<?php
// Kết nối đến cơ sở dữ liệu (Bạn cần điền thông tin của cơ sở dữ liệu của mình ở đây)
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy danh sách sản phẩm từ cơ sở dữ liệu
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Hiển thị danh sách sản phẩm
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<p><strong>{$row['product_name']}</strong> - Giá: {$row['price']} - Địa điểm: {$row['location']}</p>";
    }
} else {
    echo "Không có sản phẩm nào.";
}

// Đóng kết nối
$conn->close();
?>
<?php
// Kết nối đến cơ sở dữ liệu (Bạn cần điền thông tin của cơ sở dữ liệu của mình ở đây)
$servername = "your_server_name";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$productName = $_POST["productName"];
$price = $_POST["price"];
$location = $_POST["location"];

// Thêm dữ liệu vào cơ sở dữ liệu
$sql = "INSERT INTO products (product_name, price, location) VALUES ('$productName', $price, '$location')";

if ($conn->query($sql) === TRUE) {
    echo "Sản phẩm đã được thêm thành công!";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

// Đóng kết nối
$conn->close();
?>
