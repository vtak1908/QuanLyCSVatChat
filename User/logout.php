<?php
session_start();
// Xóa tất cả các biến session
session_unset();
// Hủy session
session_destroy();
// Chuyển hướng người dùng về trang chính
header("Location: index.php");
exit();
?>
