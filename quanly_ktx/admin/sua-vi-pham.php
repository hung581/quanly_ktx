<?php
require_once('../includes/config.php');

// Kiểm tra id truyền vào
if (!isset($_GET['id'])) {
    die("Không tìm thấy ID");
}
$id = $_GET['id'];

// Xử lý khi nhấn nút Cập nhật
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $masv = $_POST['masv'];
    $noidung = $_POST['noidungvipham'];
    $ngay = $_POST['ngayvipham'];
    $hinhthuc = $_POST['hinhthucphat'];

    $sql = "UPDATE vipham SET masv='$masv', noidungvipham='$noidung', ngayvipham='$ngay', hinhthucphat='$hinhthuc' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cập nhật thành công!'); window.location='vi-pham.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

// Lấy thông tin bản ghi hiện tại
$result = mysqli_query($conn, "SELECT * FROM vipham WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Bản ghi không tồn tại.");
}
?>

<!DOCTYPE html>
<html>
<body>
    <h2>Sửa thông tin vi phạm</h2>
    <form method="POST">
        Mã sinh viên: <input type="text" name="masv" value="<?php echo htmlspecialchars($row['masv']); ?>"><br>
        Lỗi vi phạm: <input type="text" name="noidungvipham" value="<?php echo htmlspecialchars($row['noidungvipham']); ?>"><br>
        Hình thức xử lý: <input type="text" name="hinhthucphat" value="<?php echo htmlspecialchars($row['hinhthucphat']); ?>"><br>
        Ngày vi phạm: <input type="date" name="ngayvipham" value="<?php echo htmlspecialchars($row['ngayvipham']); ?>"><br>
        <button type="submit">Cập nhật</button>
    </form>
</body>
</html>