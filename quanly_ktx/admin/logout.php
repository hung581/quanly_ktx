<?php
// Gọi file config để hệ thống nhận diện được Session
require_once('../includes/config.php');

// 1. Hủy bỏ tất cả các biến Session
$_SESSION = array();

// 2. Hủy bỏ session trên server
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Hủy session hoàn toàn
session_destroy();

// 4. Chuyển hướng người dùng về trang đăng nhập
header("Location: login.php");
exit();
?>