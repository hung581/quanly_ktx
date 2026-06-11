<?php
// 1. Kết nối database
require_once('../includes/config.php');

// 2. Kiểm tra xem có ID truyền qua đường dẫn không
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // 3. Thực hiện lệnh xóa
    $sql_delete = "DELETE FROM diennuoc WHERE id = '$id'";

    if (mysqli_query($conn, $sql_delete)) {
        // Xóa thành công, quay về trang danh sách
        echo "<script>alert('Đã xóa thành công!'); window.location='dien-nuoc.php';</script>";
    } else {
        // Nếu có lỗi, thông báo lỗi
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
} else {
    // Nếu không có ID, quay về trang danh sách
    header("Location: dien-nuoc.php");
    exit();
}
?>