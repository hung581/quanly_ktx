<?php
require_once('../includes/config.php');

// Kiểm tra ID
if (!isset($_GET['id'])) { header("Location: phong.php"); exit(); }
$id = $_GET['id'];

// Xử lý cập nhật khi nhấn nút
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mp = $_POST['maphong'];
    $tp = $_POST['tenphong'];
    $lp = $_POST['loaiphong'];
    $st = $_POST['songuoitoida'];
    $gp = $_POST['gia_phong'];
    $tt = $_POST['trang_thai'];

    $sql = "UPDATE phong SET maphong='$mp', tenphong='$tp', loaiphong='$lp', songuoitoida='$st', gia_phong='$gp', trang_thai='$tt' WHERE id=$id";
    
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Cập nhật phòng thành công!'); window.location='phong.php';</script>";
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}

// Lấy thông tin cũ để hiển thị
$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM phong WHERE id=$id"));
?>

<!DOCTYPE html>
<html>
<head><title>Sửa thông tin phòng</title></head>
<body>
    <h2>Sửa phòng: <?php echo $row['maphong']; ?></h2>
    <form method="POST">
        Mã phòng: <input type="text" name="maphong" value="<?php echo $row['maphong']; ?>"><br>
        Tên phòng: <input type="text" name="tenphong" value="<?php echo $row['tenphong']; ?>"><br>
        Loại phòng: <input type="text" name="loaiphong" value="<?php echo $row['loaiphong']; ?>"><br>
        Số người tối đa: <input type="number" name="songuoitoida" value="<?php echo $row['songuoitoida']; ?>"><br>
        Giá phòng: <input type="text" name="gia_phong" value="<?php echo $row['gia_phong']; ?>"><br>
        Trạng thái: <input type="text" name="trang_thai" value="<?php echo $row['trang_thai']; ?>"><br>
        <button type="submit">Cập nhật</button>
        <a href="phong.php">Hủy</a>
    </form>
</body>
</html>