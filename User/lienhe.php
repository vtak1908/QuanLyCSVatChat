<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ</title>
    <link rel="stylesheet" href="css/style.css">

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
                <?php if (isset($_SESSION["user"])) {
              ?>
              <i class="login-btn"> Hello <?php echo $_SESSION['user'] ?></i>
          
                <a href="logout.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Xuất
                </a>
                <?php } else { ?>
                    <a href="signin.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Nhập
                    <a href="signup.php" class="login-btn">
                    <i class="fas fa-user"></i> Đăng Ký
                </a>
                <?php } ?>
            </div>
        </div>
    </nav>

    <section class="contact-form">
        <h3>LET'S ANSWER YOUR QUERIES</h3>
        <form>
            <div class="form-group">
                <label for="first-name">FIRST NAME</label>
                <input type="text" id="first-name" required>
            </div>
            <div class="form-group">
                <label for="last-name">LAST NAME</label>
                <input type="text" id="last-name" required>
            </div>
            <div class="form-group">
                <label for="email">E-MAIL</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="message">LEAVE A MESSAGE FOR US</label>
                <textarea id="message" rows="6"></textarea>
            </div>
            <button type="submit">SUBMIT</button>
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
