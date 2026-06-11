<?php
// Gọi cấu hình để đảm bảo hệ thống nhận diện đúng đường dẫn
require_once('includes/config.php');
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chào mừng đến với KTX</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body { background: #f8f9fa; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .hero { text-align: center; }
    </style>
</head>
<body>
    <div class="hero">
        <h1>Chào mừng bạn đến với Hệ thống Quản lý KTX</h1>
        <p class="lead">Hệ thống hỗ trợ quản lý sinh viên và cơ sở vật chất.</p>
        <div class="mt-4">
            <a href="admin/login.php" class="btn btn-primary btn-lg">Truy cập trang Quản trị (Admin)</a>
        </div>
    </div>
</body>
</html>