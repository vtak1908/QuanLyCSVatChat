<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Bảo Trì</title>
    <link rel="stylesheet" href="css/baotri_admin.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

</head>
<body>
    <header>
    <h1>Bảo Trì</h1>
    <nav>
        <div class="nav-container">
            <div class="logo">
                <a href="index.html">
                    <img src="img/logoql.jpg" alt="logo">
                </a>
            </div>
            <ul class="nav-links">
                <li><a href="trangchu.php">Trang Chủ</a></li>
                <li><a href="taisan.php">Quản lý tài sản</a></li>
                <li><a href="baocao.php">Báo Cáo</a></li>
                <li><a href="lienhe.php">Liên Hệ</a></li>
            </ul>
        </div>
    </nav>
</header>

    <main>
        <section id="maintenance-request" class="card">
            <h2>Gửi Yêu Cầu Bảo Trì</h2>
            <form id="maintenanceForm">
                <div class="form-group">
                    <label for="device">Chọn Thiết Bị:</label>
                    <select id="device" required>
                        <option value="">-- Chọn Thiết Bị --</option>
                        <option value="Printer">Máy In</option>
                        <option value="Computer">Máy Tính</option>
                        <option value="Router">Thiết Bị Mạng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Mô Tả Vấn Đề:</label>
                    <textarea id="description" required placeholder="Mô tả lỗi thiết bị..."></textarea>
                </div>
                <div class="form-group">
                    <label for="file">Đính Kèm Hình Ảnh/Video:</label>
                    <input type="file" id="file" accept="image/*,video/*">
                </div>
                <button type="submit">Gửi Yêu Cầu</button>
            </form>
        </section>

        <section id="device-list" class="card">
            <h2>Danh Sách Thiết Bị Cần Bảo Trì</h2>
            <input type="text" id="search" placeholder="Tìm thiết bị..." onkeyup="searchDevice()">
            <ul id="deviceList">
                <li>Máy In HP - <span class="status pending">Chờ bảo trì</span></li>
                <li>Máy Tính Dell - <span class="status in-progress">Đang xử lý</span></li>
                <li>Router TP-Link - <span class="status completed">Hoàn thành</span></li>
            </ul>
        </section>

        <section id="maintenance-chart" class="card">
            <h2>Thống Kê Yêu Cầu</h2>
            <canvas id="maintenanceChart"></canvas>
        </section>
    </main>

    <section class="footer">
        <div class="visit-us">
            <p>&copy; 2024 - Đại Học Phương Đông  - Hệ Thống Quản Lý Cơ Sở Vật Chất</p>
            <p><i class="fas fa-phone"></i>  0243 623 0234</p>
            <p><i class="fas fa-envelope"></i>  contact@phuongdong.edu.vn</p>
            <p><i class="fas fa-map-marker-alt"></i>  Cơ sở 1: 171 Trung Kính, Yên Hòa, Cầu Giấy, Hà Nội</p>
            <p><i class="fas fa-map-marker-alt"></i>  Cơ sở 2: Số 4, ngõ chùa Hưng, phố Minh Khai, Hai Bà Trưng, Hà Nội</p>
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
