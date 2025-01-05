<?php
$server = "localhost";
$user = "root";
$pass = "";
$database = "quanlycosovatchat";
$conn = mysqli_connect($server, $user, $pass, $database);


if (!$conn) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}
mysqli_query($conn, 'set names "utf8"');
?>
