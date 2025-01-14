<?php
session_start();
include("control.php");
$get_user = new data_user();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    $result = $get_user->update_User($id, $username, $password, $role);

    if ($result) {
        echo "<script>alert('Cập nhật thông tin người dùng thành công'); window.location='QLND.php';</script>";
    } else {
        echo "<script>alert('Cập nhật thông tin người dùng thất bại'); window.location='QLND.php';</script>";
    }
}
?>