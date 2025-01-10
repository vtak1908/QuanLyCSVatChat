<?php
session_start();
include("connect.php");
include("control.php");

$user = new data_user();
$assets = $user->select_Assets();
$maintenance = $user->select_Maintenance();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
    $maintenance_report = $user->select_Maintenance_By_Date($start_date, $end_date);
} else {
    $maintenance_report = [];
}

// Chuẩn bị dữ liệu cho biểu đồ tình trạng tài sản
$status_counts = [
    'Tốt' => 0,
    'Hỏng' => 0,
    'Đang sửa chữa' => 0,
];

while ($row = mysqli_fetch_assoc($assets)) {
    $status_counts[$row['Status']]++;
}

// Chuẩn bị dữ liệu cho biểu đồ báo cáo hoạt động bảo trì
$maintenance_counts = [
    'Hoàn thành' => 0,
    'Đang xử lý' => 0,
    'Loại bỏ' => 0,
];

while ($row = mysqli_fetch_assoc($maintenance)) {
    $maintenance_counts[$row['MaintenanceStatus']]++;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo Cáo</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        #assetStatusChart, #maintenanceReportChart {
            max-width: 400px;
            max-height: 400px;
            margin: auto;
        }
    </style>
    <style>
        .banner-text h1 {
            color: #ffffff; /* Màu trắng */
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.81); /* Đổ bóng để làm nổi bật văn bản */
        }
        .banner-text p {
            color: #f8f9fa; /* Màu trắng nhạt */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.81); /* Đổ bóng để làm nổi bật văn bản */
        }
    </style>
</head>
<body>
<header>
    <div class="banner">
        <img src="img/banner.png" alt="Banner Trường Đại Học">
        <div class="banner-text">
            <h1>Quản Lý Cơ Sở Vật Chất Đại Học</h1>
            <p>Hệ thống quản lý cơ sở vật chất hiện đại, tối ưu cho trường đại học</p>
            <a href="#" class="btn">Tìm Hiểu Thêm</a>
        </div>
    </div>
</header>
<nav>
    <div class="nav-container">
        <div class="logo">
            <a href="#">
                <img src="img/logoql.png" alt="logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Trang Chủ</a></li>
            <li><a href="taisan_User.php">Quản lý tài sản</a></li>
            <li><a href="baotri.php">Bảo trì</a></li>
            <li><a href="baocao.php">Báo Cáo</a></li>
            <li><a href="lienhe.php">Liên Hệ</a></li>
        </ul>
        <div class="right-section">
            <div class="search-box">
                <input type="text" placeholder="Tìm kiếm...">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>
            <?php if (isset($_SESSION["user"])) { ?>
                <i class="login-btn"> Hello <?php echo $_SESSION['user'] ?></i>
                <a href="logout.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Xuất
                </a>
            <?php } else { ?>
                <a href="signin.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Nhập
                </a>
                <a href="signup.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Ký
                </a>
            <?php } ?>
        </div>
    </div>
</nav>

<main>
    <section id="asset-report">
        <h2>Báo Cáo Tình Trạng Tài Sản</h2>
        <canvas id="assetStatusChart"></canvas>
    </section>

    <section id="maintenance-report">
        <h2>Báo Cáo Hoạt Động Bảo Trì</h2>
        
        <canvas id="maintenanceReportChart"></canvas>
    </section>
</main>

<section class="footer">
    <div class="visit-us">
        <p>&copy; 2024 - Đại Học Phương Đông - Hệ Thống Quản Lý Cơ Sở Vật Chất</p>
        <p><i class="fas fa-phone"></i> 0243 623 0234</p>
        <p><i class="fas fa-envelope"></i> contact@phuongdong.edu.vn</p>
        <p><i class="fas fa-map-marker-alt"></i> Cơ sở 1: 171 Trung Kính, Yên Hòa, Cầu Giấy, Hà Nội</p>
        <p><i class="fas fa-map-marker-alt"></i> Cơ sở 2: Số 4, ngõ chùa Hưng, phố Minh Khai, Hai Bà Trưng, Hà Nội</p>
    </div>
    <div class="socials">
        <h3>FOLLOW OUR SOCIALS</h3>
        <p>
            <a href="https://www.instagram.com/" target="_blank">
                <i class="fa-brands fa-instagram"></i>
            </a>
            <a href="https://www.facebook.com/" target="_blank">
                <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://discord.com/" target="_blank">
                <i class="fa-brands fa-discord"></i>
            </a>
        </p>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('assetStatusChart').getContext('2d');
    var assetStatusChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Tốt', 'Hỏng', 'Đang sửa chữa'],
            datasets: [{
                label: 'Tình Trạng Tài Sản',
                data: [<?php echo $status_counts['Tốt']; ?>, <?php echo $status_counts['Hỏng']; ?>, <?php echo $status_counts['Đang sửa chữa']; ?>],
                backgroundColor: ['#4CAF50', '#FF0000', '#FFC107'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Tình Trạng Tài Sản'
                }
            }
        },
    });

    var ctx2 = document.getElementById('maintenanceReportChart').getContext('2d');
    var maintenanceReportChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['Hoàn thành', 'Đang xử lý', 'Loại bỏ'],
            datasets: [{
                label: 'Hoạt Động Bảo Trì',
                data: [<?php echo $maintenance_counts['Hoàn thành']; ?>, <?php echo $maintenance_counts['Đang xử lý']; ?>, <?php echo $maintenance_counts['Loại bỏ']; ?>],
                backgroundColor: ['#4CAF50', '#FFC107', '#FF0000'],
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Hoạt Động Bảo Trì'
                }
            }
        },
    });
</script>
</body>
</html>