<?php
// 1. Kết nối database và kiểm tra đăng nhập
require_once('../includes/config.php');
checkLogin();

// 2. Hàm lấy số lượng bản ghi để thống kê
function getCount($conn, $table) {
    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM $table");
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

$total_sv = getCount($conn, 'sinhvien');
$total_phong = getCount($conn, 'phong');
$total_diennuoc = getCount($conn, 'diennuoc');
$total_vipham = getCount($conn, 'vipham');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bảng điều khiển - Quản lý KTX</title>
    <link rel="stylesheet" href="../includes/style.css">
</head>
<body>

<div class="main-layout">
    <div class="sidebar">
        <h3>Menu quản lý:</h3>
        <ul>
            <li><a href="dashboard.php">Bảng điều khiển</a></li>
            <li><a href="sinhvien.php">Quản lý sinh viên</a></li>
            <li><a href="phong.php">Quản lý phòng</a></li>
            <li><a href="dien-nuoc.php">Quản lý điện nước</a></li>
            <li><a href="vi-pham.php">Quản lý vi phạm</a></li>
            <li><a href="logout.php" style="color: #e74c3c;">Đăng xuất</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h1>Chào mừng, admin!</h1>

        <div class="card-container">
            <div class="card card-blue">
                <h3>Tổng sinh viên</h3>
                <p style="font-size: 2rem; font-weight: bold;"><?php echo $total_sv; ?></p>
            </div>
            <div class="card card-green">
                <h3>Tổng số phòng</h3>
                <p style="font-size: 2rem; font-weight: bold;"><?php echo $total_phong; ?></p>
            </div>
        </div>

        <div style="background: white; padding: 25px; border-radius: 15px; margin-top: 30px; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <h3>Tổng quan hệ thống:</h3>
            <ul style="list-style: none; margin-top: 10px;">
                <li>Số lượng bản ghi điện nước: <strong><?php echo $total_diennuoc; ?></strong></li>
                <li>Số lượng vụ vi phạm: <strong><?php echo $total_vipham; ?></strong></li>
            </ul>
            <p style="margin-top: 15px; color: #666;">Chọn các mục trong menu bên trái để thực hiện quản lý chi tiết.</p>
        </div>
    </div>
</div>

</body>
</html>