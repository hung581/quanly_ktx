<?php
require_once('../includes/config.php');
if (isset($_GET['id'])) {
    mysqli_query($conn, "DELETE FROM vipham WHERE id=" . $_GET['id']);
}
header("Location: vi-pham.php");
exit();
?>