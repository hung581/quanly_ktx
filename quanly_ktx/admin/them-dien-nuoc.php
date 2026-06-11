<?php
require_once('../includes/config.php');
checkLogin();

// Xử lý khi nhấn nút Thêm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maphong = $_POST['maphong'];
    $sodien = $_POST['sodien'];
    $sonuoc = $_POST['sonuoc'];
    $thang = $_POST['thang']; // Lấy giá trị tháng từ form

    // Lưu vào database
    $query = "INSERT INTO diennuoc (maphong, sodien, sonuoc, thang) VALUES ('$maphong', '$sodien', '$sonuoc', '$thang')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: dien-nuoc.php?success=1");
        exit();
    } else {
        $error = "Lỗi khi thêm dữ liệu: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm hóa đơn điện nước</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>
<div class="main-layout">
    <div class="sidebar">
        <h3>Menu quản lý:</h3>
        <ul>
            <li><a href="dashboard.php">Bảng điều khiển</a></li>
            <li><a href="dien-nuoc.php">Quay lại danh sách</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h1>Thêm hóa đơn mới</h1>
        
        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <form method="POST" style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <div style="margin-bottom: 15px;">
                <label>Mã phòng:</label><br>
                <input type="text" name="maphong" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Chỉ số điện:</label><br>
                <input type="number" name="sodien" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 15px;">
                <label>Chỉ số nước:</label><br>
                <input type="number" name="sonuoc" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <div style="margin-bottom: 20px;">
                <label>Tháng/Năm (vd: 06/2026):</label><br>
                <input type="text" name="thang" required style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>
            <button type="submit" style="background: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">Thêm hóa đơn</button>
            <a href="dien-nuoc.php" style="margin-left: 10px; color: #555; text-decoration: none;">Hủy</a>
        </form>
    </div>
</div>
</body>
</html>