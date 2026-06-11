<?php
require_once('../includes/config.php');
checkLogin();

// Lấy danh sách điện nước
$query = "SELECT * FROM diennuoc";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Điện Nước</title>
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
            <li><a href="dien-nuoc.php" style="color:white; font-weight:bold;">Quản lý điện nước</a></li>
            <li><a href="vi-pham.php">Quản lý vi phạm</a></li>
        </ul>
    </div>

    <div class="content-area">
        <h1>Danh sách Điện Nước</h1>
        
        <a href="them-dien-nuoc.php" style="display:inline-block; margin-bottom:20px; background:#28a745; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">+ Thêm hóa đơn mới</a>
        
        <table border="1" style="width:100%; border-collapse:collapse; background: white;">
            <tr style="background-color: #34495e; color: white;">
                <th style="padding:12px;">ID</th>
                <th style="padding:12px;">Mã phòng</th>
                <th style="padding:12px;">Chỉ số điện</th>
                <th style="padding:12px;">Chỉ số nước</th>
                <th style="padding:12px;">Tháng</th>
                <th style="padding:12px;">Thao tác</th>
            </tr>
            
            <?php
            if($result && mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr style='text-align:center;'>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['id'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['maphong'] . "</td>";
                    // Dùng đúng tên cột 'chisodien' và 'chisonuoc' từ CSDL
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['chisodien'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['chisonuoc'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['thang'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>
                            <a href='sua-dien-nuoc.php?id=" . $row['id'] . "'>Sửa</a> | 
                            <a href='xoa-dien-nuoc.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='padding:20px;'>Chưa có dữ liệu.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>