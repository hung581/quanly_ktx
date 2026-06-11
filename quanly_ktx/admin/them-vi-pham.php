<?php
require_once('../includes/config.php');
checkLogin();

// Xử lý khi nhấn nút Ghi nhận vi phạm
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masv = $_POST['masv'];
    $noidungvipham = $_POST['noidungvipham'];
    $hinhthucphat = $_POST['hinhthucphat'];
    $ngayvipham = $_POST['ngayvipham'];

    // Câu lệnh INSERT (Sử dụng đúng tên cột noidungvipham và hinhthucphat như trong phpMyAdmin của bạn)
    $query = "INSERT INTO vipham (masv, noidungvipham, ngayvipham, hinhthucphat) 
              VALUES ('$masv', '$noidungvipham', '$ngayvipham', '$hinhthucphat')";
    
    if (mysqli_query($conn, $query)) {
        header("Location: vi-pham.php?success=1");
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
    <title>Ghi nhận vi phạm</title>
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
            <li><a href="vi-pham.php" style="color:white; font-weight:bold;">Quản lý vi phạm</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h1>Ghi nhận vi phạm sinh viên</h1>

        <?php if(isset($error)) echo "<p style='color:red;'>$error</p>"; ?>

        <div style="background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); max-width: 850px;">
            <form method="POST">
                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Mã sinh viên:</label>
                    <input type="text" name="masv" required placeholder="Nhập mã số sinh viên vi phạm" style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Nội dung vi phạm:</label>
                    <textarea name="noidungvipham" required rows="4" placeholder="Mô tả chi tiết hành vi vi phạm..." style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px; font-family: sans-serif;"></textarea>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Hình thức xử phạt:</label>
                    <input type="text" name="hinhthucphat" required placeholder="Ví dụ: Cảnh cáo, Phạt tiền, Trừ điểm rèn luyện..." style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font-size: 16px;">
                </div>

                <div style="margin-bottom: 25px;">
                    <label style="display:block; font-weight:bold; margin-bottom:8px;">Ngày vi phạm:</label>
                    <input type="date" name="ngayvipham" required style="width:100%; padding:12px; border: 1px solid #ddd; border-radius: 6px; font