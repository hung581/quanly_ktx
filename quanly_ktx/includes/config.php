<?php
// 1. Cấu hình kết nối database
$servername = "localhost";
$username = "root";       
$password = "";           
$dbname = "qlktx";        

// Tạo kết nối
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Thiết lập mã hóa tiếng Việt
mysqli_set_charset($conn, "utf8mb4");

// Thiết lập múi giờ Việt Nam
date_default_timezone_set('Asia/Ho_Chi_Minh');

// Khởi tạo session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 2. Định nghĩa hàm checkLogin để dùng chung cho mọi file
function checkLogin() {
    if (!isset($_SESSION['username'])) {
        // Nếu chưa đăng nhập, chuyển hướng về trang login
        // Lưu ý: Đảm bảo đường dẫn này đúng với vị trí file của bạn
        header("Location: ../admin/login.php");
        exit();
    }
}
?>