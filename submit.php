<?php
// Kết nối CSDL
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
$recipeName = $_POST['recipeName'];
$cuisine = $_POST['cuisine'];
$ingredients = $_POST['ingredients'];
$instructions = $_POST['instructions'];

// Lưu dữ liệu vào CSDL
$sql = "INSERT INTO recipes (recipe_name, cuisine, ingredients, instructions)
VALUES ('$recipeName', '$cuisine', '$ingredients', '$instructions')";

if ($conn->query($sql) === TRUE) {
    echo '<div class="recipe">
            <h3>'.$recipeName.'</h3>
            <p><strong>Nền văn hóa:</strong> '.$cuisine.'</p>
            <p><strong>Nguyên liệu:</strong><br>'.$ingredients.'</p>
            <p><strong>Hướng dẫn:</strong><br>'.$instructions.'</p>
          </div>';
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
