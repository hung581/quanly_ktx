<?php
// 1. Kết nối database
require_once('../includes/config.php');

// 2. Kiểm tra nếu không có ID trên URL thì quay về danh sách
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: dien-nuoc.php");
    exit();
}

$id = $_GET['id'];

// 3. Xử lý khi nhấn nút "Cập nhật"
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $maphong = mysqli_real_escape_string($conn, $_POST['maphong']);
    $chisodien = mysqli_real_escape_string($conn, $_POST['chisodien']);
    $chisonuoc = mysqli_real_escape_string($conn, $_POST['chisonuoc']);
    $thang = mysqli_real_escape_string($conn, $_POST['thang']);

    // Câu lệnh SQL cập nhật - dùng cột 'thang' thay vì 'thangnam'
    $sql_update = "UPDATE diennuoc SET 
                   maphong='$maphong', 
                   chisodien='$chisodien', 
                   chisonuoc='$chisonuoc', 
                   thang='$thang' 
                   WHERE id='$id'";

    if (mysqli_query($conn, $sql_update)) {
        echo "<script>alert('Cập nhật thành công!'); window.location='dien-nuoc.php';</script>";
        exit();
    } else {
        echo "Lỗi cập nhật: " . mysqli_error($conn);
    }
}

// 4. Lấy dữ liệu cũ từ database để hiển thị vào form
$sql_select = "SELECT * FROM diennuoc WHERE id='$id'";
$result = mysqli_query($conn, $sql_select);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    echo "Không tìm thấy dữ liệu!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa chỉ số điện nước</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; width: 120px; float: left; }
    </style>
</head>
<body>
    <h2>Sửa thông tin Điện Nước (ID: <?php echo $id; ?>)</h2>
    <form method="POST">
        <div class="form-group">
            <label>Mã phòng:</label>
            <input type="text" name="maphong" value="<?php echo htmlspecialchars($row['maphong']); ?>" required>
        </div>
        <div class="form-group">
            <label>Chỉ số điện:</label>
            <input type="text" name="chisodien" value="<?php echo htmlspecialchars($row['chisodien']); ?>" required>
        </div>
        <div class="form-group">
            <label>Chỉ số nước:</label>
            <input type="text" name="chisonuoc" value="<?php echo htmlspecialchars($row['chisonuoc']); ?>" required>
        </div>
        <div class="form-group">
            <label>Tháng:</label>
            <input type="text" name="thang" value="<?php echo htmlspecialchars($row['thang']); ?>" required>
        </div>
        <button type="submit">Cập nhật dữ liệu</button>
        <a href="dien-nuoc.php">Hủy bỏ</a>
    </form>
</body>
</html>