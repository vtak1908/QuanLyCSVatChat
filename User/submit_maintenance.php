<?php
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $asset_id = $_POST['asset'];
    $description = $_POST['description'];
    $maintenance_date = date('Y-m-d'); // Ngày hiện tại

    // Lưu thông tin vào cơ sở dữ liệu
    $sql = "INSERT INTO maintenance (Id_Assets, MaintenanceDate, Description) VALUES ('$asset_id', '$maintenance_date', '$description')";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Yêu cầu bảo trì đã được gửi thành công!'); window.location.href='baotri.php';</script>";
    } else {
        echo "<script>alert('Lỗi: " . mysqli_error($conn) . "'); window.location.href='baotri.php';</script>";
    }
}
?>