<?php
require_once('../includes/config.php');
checkLogin();

// Lấy danh sách vi phạm từ database
$query = "SELECT * FROM vipham";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Vi phạm</title>
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
        <h1>Quản lý Vi phạm</h1>
        
        <a href="them-vi-pham.php" style="display:inline-block; margin-bottom:20px; background:#28a745; color:white; padding:10px 20px; text-decoration:none; border-radius:5px;">+ Thêm vụ vi phạm mới</a>
        
        <table border="1" style="width:100%; border-collapse:collapse; background: white; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            <tr style="background-color: #34495e; color: white;">
                <th style="padding:12px;">ID</th>
                <th style="padding:12px;">Mã SV</th>
                <th style="padding:12px;">Lỗi vi phạm</th>
                <th style="padding:12px;">Ngày vi phạm</th>
                <th style="padding:12px;">Hình thức xử lý</th>
                <th style="padding:12px;">Thao tác</th>
            </tr>
            
            <?php
            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr style='text-align:center;'>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['id'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['masv'] . "</td>";
                    // Dùng đúng tên cột 'noidungvipham' thay vì 'loivipham'
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['noidungvipham'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['ngayvipham'] . "</td>";
                    // Dùng đúng tên cột 'hinhthucphat' thay vì 'hinhthucxuly'
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>" . $row['hinhthucphat'] . "</td>";
                    echo "<td style='padding:10px; border-bottom:1px solid #ddd;'>
                            <a href='sua-vi-pham.php?id=" . $row['id'] . "'>Sửa</a> | 
                            <a href='xoa-vi-pham.php?id=" . $row['id'] . "' onclick='return confirm(\"Bạn chắc chắn muốn xóa?\")'>Xóa</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' style='padding:20px;'>Chưa có dữ liệu vi phạm.</td></tr>";
            }
            ?>
        </table>
    </div>
</div>

</body>
</html>