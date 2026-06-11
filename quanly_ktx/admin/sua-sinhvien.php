<?php
require_once('../includes/config.php');
checkLogin();

// Lấy danh sách sinh viên từ CSDL
$query = "SELECT * FROM sinhvien";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sinh viên</title>
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
        <h1>Danh sách Sinh viên</h1>
        
        <a href="them-sinh-vien.php" style="display:inline-block; margin-bottom:20px; background:#28a745; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">+ Thêm sinh viên mới</a>
        
        <table border="1" style="width:100%; border-collapse:collapse; background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <tr style="background-color: #34495e; color: white;">
                <th style="padding:12px;">ID</th>
                <th style="padding:12px;">Họ và tên</th>
                <th style="padding:12px;">Mã SV</th>
                <th style="padding:12px;">Số điện thoại</th>
                <th style="padding:12px;">Mã phòng</th>
                <th style="padding:12px;">Thao tác</th>
            </tr>
            
            <?php
            if($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr style='text-align:center;'>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['id'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['hoten'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['masv'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['sodienthoai'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['maphong'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>
                            <a href='sua-sinh-vien.php?id=" . $row['id'] . "'>Sửa</a> | 
                            <a href='xoa-sinh-vien.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa sinh viên này?\")'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='padding:20px;'>Chưa có dữ liệu sinh viên.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>