<?php
require_once('../includes/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    mysqli_query($conn, "DELETE FROM phong WHERE id=$id");
}
header("Location: phong.php");
exit();
?>