<?php
require_once('../includes/config.php');
checkLogin();

// Giả sử $result đã được lấy từ câu lệnh SELECT * FROM phong
$result = mysqli_query($conn, "SELECT * FROM phong");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Phòng - KTX</title>
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
        <h1>Quản lý phòng</h1>
        <a href="them-phong.php" class="btn btn-add">+ Thêm phòng mới</a>
        
        <table border="1" style="width:100%; margin-top:20px; border-collapse:collapse;">
            <tr>
                <th>Mã phòng</th>
                <th>Tên phòng</th>
                <th>Loại phòng</th>
                <th>Số người tối đa</th>
                <th>Thao tác</th>
            </tr>
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['maphong'] . "</td>";
                    echo "<td>" . $row['tenphong'] . "</td>";
                    echo "<td>" . $row['loaiphong'] . "</td>";
                    echo "<td>" . $row['songuoitoida'] . "</td>";
                    echo "<td>
                            <a href='sua-phong.php?id=" . $row['id'] . "'>Sửa</a> | 
                            <a href='xoa-phong.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa phòng này?\")'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Chưa có dữ liệu phòng</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>