<?php
require_once('../includes/config.php');
checkLogin();

// Xử lý khi nhấn nút Lưu sinh viên
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoten = $_POST['hoten'];
    $masv = $_POST['masv'];
    $sodienthoai = $_POST['sodienthoai'];
    $maphong = $_POST['maphong'];

    // Câu lệnh INSERT vào bảng sinhvien
    $query = "INSERT INTO sinhvien (hoten, masv, sodienthoai, maphong) VALUES ('$hoten', '$masv', '$sodienthoai', '$maphong')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: sinhvien.php?success=1");
        exit();
    } else {
        $error = "Lỗi: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sinh viên mới</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>

<div class="main-layout">
    <div class="sidebar">
        <h3>Menu quản lý:</h3>
        <ul>
            <li><a href="dashboard.php">Bảng điều khiển</a></li>
            <li><a href="sinhvien.php" style="color:white; font-weight:bold;">Quản lý sinh viên</a></li>
            <li><a href="phong.php">Quản lý phòng</a></li>
            <li><a href="dien-nuoc.php">Quản lý điện nước</a></li>
            <li><a href="vi-pham.php">Quản lý vi phạm</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h1>Thêm sinh viên mới vào KTX</h1>

        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 800px;">
            <form method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Họ và tên:</label>
                    <input type="text" name="hoten" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Mã sinh viên:</label>
                    <input type="text" name="masv" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Số điện thoại:</label>
                    <input type="text" name="sodienthoai" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Mã phòng:</label>
                    <input type="text" name="maphong" placeholder="Ví dụ: P101" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                    <small style="color: #666; margin-top: 5px; display: block;">Nhập mã phòng mà sinh viên sẽ ở.</small>
                </div>

                <div style="border-top: 1px solid #eee; padding-top: 20px;">
                    <button type="submit" style="background: #28a745; color: white; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; transition: 0.3s;">
                        Lưu sinh viên
                    </button>
                    <a href="sinhvien.php" style="margin-left: 15px; color: #666; text-decoration: none; font-size: 16px;">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>