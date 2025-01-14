<?php
session_start();
include("connect.php");
include("control.php");
$get_user = new data_user();
if (empty($_SESSION['user'])) {
  echo "<script>alert('Bạn cần đăng nhập để thực hiện thao tác này');
    window.location = 'signin.php';</script>";
}
$user = new data_user();
$assets = $user->select_Assets();
$maintenance = $user->select_Maintenance();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Bảo Trì</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <section id="maintenance-request">
        <h2>Yêu Cầu Bảo Trì</h2>
        <form id="maintenanceForm" method="POST" action="submit_maintenance.php">
            <div class="form-group">
                <label for="asset">Chọn Tài Sản:</label>
                <table id="asset-table">
                    <thead>
                        <tr>
                            <th>Chọn</th>
                            <th>Tên Tài Sản</th>
                            <th>Hình Ảnh</th>
                            <th>Loại Tài Sản</th>
                            <th>Tình Trạng</th>
                            <th>Vị Trí</th>
                            <th>Ngày Mua</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($assets)) { ?>
                            <tr>
                                <td>
                                    <input type="radio" id="asset-<?php echo $row['Id_Assets']; ?>" name="asset" value="<?php echo $row['Id_Assets']; ?>" required>
                                </td>
                                <td>
                                    <label for="asset-<?php echo $row['Id_Assets']; ?>">
                                        <?php echo $row['Name']; ?>
                                    </label>
                                </td>
                                <td>
                                    <img src="Admin/uploads/<?php echo $row['Img']; ?>" alt="<?php echo $row['Name']; ?>" style="width: 100px; height: auto;">
                                </td>
                                <td><?php echo $row['Type']; ?></td>
                                <td><?php echo $row['Status']; ?></td>
                                <td><?php echo $row['Location']; ?></td>
                                <td><?php echo $row['PurchaDate']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="description">Mô Tả Vấn Đề:</label>
                <textarea id="description" name="description" required placeholder="Mô tả vấn đề..."></textarea>
            </div>
            <button type="submit">Gửi Yêu Cầu</button>
        </form>
    </section>

    <section id="maintenance-list">
        <h2>Danh Sách Bảo Trì</h2>
        <table>
            <thead>
                <tr>
                   
                    <th>Tài Sản</th>
                    <th>Mô Tả</th>
                    <th>Ngày Bảo Trì</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($maintenance)) { ?>
                    <tr>
                        
                        <td><?php echo $row['AssetName']; ?></td>
                        <td><?php echo $row['Description']; ?></td>
                        <td><?php echo $row['MaintenanceDate']; ?></td>
                        <td><?php echo $row['MaintenanceStatus']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
<script src="baotri.js"></script>
</body>
</html>