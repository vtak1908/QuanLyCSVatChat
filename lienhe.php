<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
    <style>
        .contact-form {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .contact-form h3 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .contact-form button {
            display: block;
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #0056b3;
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

<section class="contact-form">
    <h3>Hãy để chúng tôi giải đáp câu hỏi của bạn</h3>
    <form>
        <div class="form-group">
            <label for="first-name">Tên</label>
            <input type="text" id="first-name" required>
        </div>
        <div class="form-group">
            <label for="last-name">Họ</label>
            <input type="text" id="last-name" required>
        </div>
        <div class="form-group">
            <label for="email">E-mail</label>
            <input type="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="message">Để lại tin nhắn cho chúng tôi</label>
            <textarea id="message" rows="6" required></textarea>
        </div>
        <button type="submit">Gửi</button>
    </form>
</section>

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
</body>
</html>
