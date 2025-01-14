<?php
session_start();
include("control.php");
$get_user = new data_user();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $get_user->delete_Maintenance($id);

    if ($result) {
        echo "<script>alert('Xóa bảo trì thành công'); window.location='QLBT.php';</script>";
    } else {
        echo "<script>alert('Xóa bảo trì thất bại'); window.location='QLBT.php';</script>";
    }
}
?>