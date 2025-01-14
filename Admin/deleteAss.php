<?php
session_start();
include("control.php");
$get_Data = new data_user();

// Kiểm tra nếu người dùng đã đăng nhập và có vai trò là admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
  echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
  window.location = 'login.php';</script>";
  exit();
}

if (isset($_GET['del'])) {
    $id = $_GET['del'];

    // Xóa tài sản từ cơ sở dữ liệu
    $result = $get_Data->delete_assets($id);

    if ($result) {
        echo "<script>alert('Xóa tài sản thành công'); window.location='QLTS.php';</script>";
    } else {
        echo "<script>alert('Xóa tài sản thất bại'); window.location='QLTS.php';</script>";
    }
}
?>