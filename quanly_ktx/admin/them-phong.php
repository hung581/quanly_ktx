<?php
require_once('../includes/config.php');
checkLogin();

// Xử lý khi nhấn nút Thêm phòng
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $maphong = $_POST['maphong'];
    $tenphong = $_POST['tenphong'];
    $loaiphong = $_POST['loaiphong'];
    $soluong_toida = $_POST['soluong_toida'];

    // Câu lệnh INSERT vào bảng phong (Bạn hãy kiểm tra lại tên bảng và tên cột trong DB của mình nhé)
    $query = "INSERT INTO phong (maphong, tenphong, loaiphong, soluong_toida) 
              VALUES ('$maphong', '$tenphong', '$loaiphong', '$soluong_toida')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: phong.php?success=1");
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
    <title>Thêm phòng mới</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>

<div class="main-layout">
    <div class="sidebar">
        <h3>Menu quản lý:</h3>
        <ul>
            <li><a href="dashboard.php">Bảng điều khiển</a></li>
            <li><a href="sinhvien.php">Quản lý sinh viên</a></li>
            <li><a href="phong.php" style="color:white; font-weight:bold;">Quản lý phòng</a></li>
            <li><a href="dien-nuoc.php">Quản lý điện nước</a></li>
            <li><a href="vi-pham.php">Quản lý vi phạm</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h1>Thêm phòng ký túc xá mới</h1>

        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 800px;">
            <form method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Mã phòng:</label>
                    <input type="text" name="maphong" placeholder="Ví dụ: P101" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Tên phòng:</label>
                    <input type="text" name="tenphong" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Loại phòng:</label>
                    <select name="loaiphong" style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; background: white;">
                        <option value="Thường">Thường</option>
                        <option value="Dịch vụ">Dịch vụ (Máy lạnh)</option>
                        <option value="VIP">VIP</option>
                    </select>
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Số người tối đa:</label>
                    <input type="number" name="soluong_toida" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="border-top: 1px solid #eee; padding-top: 20px;">
                    <button type="submit" style="background: #28a745; color: white; padding: 12px 30px; border: none; border-radius: 6px; cursor: pointer; font-size: 16px; font-weight: bold; transition: 0.3s;">
                        Thêm phòng
                    </button>
                    <a href="phong.php" style="margin-left: 15px; color: #666; text-decoration: none; font-size: 16px;">Hủy / Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>