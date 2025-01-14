<?php
session_start();
include("control.php");
$get_user = new data_user();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $get_user->delete_User($id);

    if ($result) {
        echo "<script>alert('Xóa người dùng thành công'); window.location='QLND.php';</script>";
    } else {
        echo "<script>alert('Xóa người dùng thất bại'); window.location='QLND.php';</script>";
    }
}
?>