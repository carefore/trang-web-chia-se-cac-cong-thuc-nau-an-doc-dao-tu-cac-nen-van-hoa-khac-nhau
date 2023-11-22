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

// Truy vấn CSDL để lấy danh sách công thức nấu ăn
$sql = "SELECT recipe_name, cuisine, ingredients, instructions FROM recipes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="recipe">
                <h3>'.$row["recipe_name"].'</h3>
                <p><strong>Nền văn hóa:</strong> '.$row["cuisine"].'</p>
                <p><strong>Nguyên liệu:</strong><br>'.$row["ingredients"].'</p>
                <p><strong>Hướng dẫn:</strong><br>'.$row["instructions"].'</p>
              </div>';
    }
} else {
    echo "0 kết quả";
}

$conn->close();
?>
