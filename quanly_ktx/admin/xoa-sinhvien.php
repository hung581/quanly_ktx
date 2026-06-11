<?php
require_once('../includes/config.php');
checkLogin();

// 1. Kiểm tra xem có ID truyền vào không
if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Ép kiểu về số nguyên để bảo mật

    // 2. Thực hiện câu lệnh xóa
    $sql = "DELETE FROM sinhvien WHERE id = $id";
    
    if (mysqli_query($conn, $sql)) {
        // Xóa thành công, chuyển hướng về trang danh sách
        header("Location: sinh-vien.php?status=deleted");
        exit();
    } else {
        echo "Lỗi khi xóa dữ liệu: " . mysqli_error($conn);
    }
} else {
    // Nếu không có ID, quay về danh sách
    header("Location: sinh-vien.php");
    exit();
}
?>