<?php
session_start();
include("control.php");
$get_user = new data_user();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $result = $get_user->update_Maintenance_Status($id, $status);

    if ($result) {
        echo "<script>alert('Cập nhật trạng thái thành công'); window.location='QLBT.php';</script>";
    } else {
        echo "<script>alert('Cập nhật trạng thái thất bại'); window.location='QLBT.php';</script>";
    }
}
?>