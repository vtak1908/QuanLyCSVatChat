<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Cơ Sở Vật Chất Đại Học</title>
    <link rel="stylesheet" href="css/style.css">
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
    

    <main>
        <section>
            <h2>Giới Thiệu</h2>
            <p>Chào mừng bạn đến với hệ thống quản lý cơ sở vật chất đại học. Hệ thống của chúng tôi được thiết kế nhằm hỗ trợ việc theo dõi, kiểm kê và quản lý toàn bộ trang thiết bị, phòng học, giảng đường, phòng thí nghiệm và các hạ tầng thiết yếu trong khuôn viên trường. Với giao diện thân thiện và tính năng hiện đại, chúng tôi giúp tiết kiệm thời gian, nâng cao hiệu suất làm việc và tối ưu hóa việc sử dụng tài nguyên. Hệ thống cung cấp khả năng báo cáo chi tiết, theo dõi tình trạng thiết bị theo thời gian thực, đồng thời hỗ trợ lên kế hoạch bảo trì và nâng cấp cơ sở vật chất, đảm bảo môi trường học tập và giảng dạy luôn đạt tiêu chuẩn cao nhất.</p>
            <div class="image-container">
                <img src="img/csvc.png" alt="Giới thiệu" class="intro-image">
                <img src="img/csvc1.jpg" alt="Giới thiệu" class="intro-image">
                <img src="img/csvc2.jpg" alt="Giới thiệu" class="intro-image">
            </div>
        </section>
        

        <section>
            <h2>Danh Mục Cơ Sở Vật Chất</h2>
            <div class="items">
                <div class="item">
                    <img src="img/banhoc.png" alt="Bàn Học">
                    <h3>Bàn Học</h3>
                    <p>Số lượng: 300</p>
                    <p>Vị trí: Các phòng học từ A101 đến A310.</p>
                    <p>Thông tin: Bàn học gỗ, kích thước 1.2m x 0.6m, màu nâu, thiết kế chân sắt chống gỉ.</p>
                </div>
                <div class="item">
                    <img src="img/maychieu.png" alt="Máy Chiếu">
                    <h3>Máy Chiếu</h3>
                    <p>Số lượng: 45</p>
                    <p>Vị trí: Phòng họp lớn và các giảng đường B201 - B205.</p>
                    <p>Thông tin: Máy chiếu Epson, độ phân giải Full HD, cường độ sáng 4000 lumens, cổng HDMI và VGA.</p>
                </div>
                <div class="item">
                    <img src="img/maytinh.png" alt="Máy Tính">
                    <h3>Máy Tính</h3>
                    <p>Số lượng: 200</p>
                    <p>Vị trí: Phòng máy tính từ C301 đến C310.</p>
                    <p>Thông tin: Máy tính Dell OptiPlex 7080, CPU Intel i5, RAM 16GB, SSD 512GB, màn hình 24 inch.</p>
                </div>
                <div class="item">
                    <img src="img/bang.jpg" alt="Bảng Tương Tác">
                    <h3>Bảng Tương Tác</h3>
                    <p>Số lượng: 20</p>
                    <p>Vị trí: Phòng học thông minh tầng D1 và D2.</p>
                    <p>Thông tin: Bảng tương tác thông minh, kích thước 86 inch, hỗ trợ cảm ứng đa điểm, kết nối không dây.</p>
                </div>
                <div class="item">
                    <img src="img/phongthinghiem.jpg" alt="Phòng Thí Nghiệm">
                    <h3>Phòng Thí Nghiệm</h3>
                    <p>Số lượng: 10</p>
                    <p>Vị trí: Khu vực thí nghiệm tầng hầm T1.</p>
                    <p>Thông tin: Phòng thí nghiệm tiêu chuẩn, trang bị máy móc hiện đại, bàn thí nghiệm chống hóa chất, hệ thống thông gió.</p>
                </div>
            </div>
        </section>
        
        

        <section>
            <h2>Tin Tức Mới Nhất</h2>
            <ul class="news">
                <li>
                    <a href="#">Thông báo mở lớp học vào tháng sau</a>
                    <p>Chúng tôi sẽ mở các lớp học mới vào tháng tới. Đăng ký ngay để giữ chỗ.</p>
                    <img src="img/tintuc.jpg" alt="Lớp học mới" width="200">
                </li>
                <li>
                    <a href="taisan.html">Cập nhật cơ sở vật chất mới trong học kỳ này</a>
                    <p>Trường học đã hoàn thành việc nâng cấp cơ sở vật chất, với các phòng học được trang bị công nghệ mới.</p>
                    <img src="img/tintuc1.jpg" alt="Cơ sở vật chất mới" width="200">
                </li>
                <li>
                    <a href="#">Lịch bảo trì hệ thống điện và nước</a>
                    <p>Hệ thống điện và nước sẽ được bảo trì từ ngày 25 đến 27 tháng 12. Xin quý vị lưu ý.</p>
                    <img src="img/tintuc2.jpg" alt="Bảo trì hệ thống" width="200">
                </li>
            </ul>
        </section>        

     <!-- Các Dịch Vụ -->
<section id="services">
    <h2>Các Dịch Vụ</h2>
    <div class="service-container">
        <div class="service-item">
            <img src="img/device-management.jpg" alt="Quản Lý Thiết Bị">
            <div>
                <h3>Quản Lý Thiết Bị</h3>
                <p>Theo dõi và quản lý tất cả thiết bị trong trường đại học, bao gồm bảo trì, nâng cấp và thay thế thiết bị khi cần thiết.</p>
            </div>
        </div>
        <div class="service-item">
            <img src="img/quanlytruonghoc.jpg" alt="Quản Lý Phòng Học">
            <div>
                <h3>Quản Lý Phòng Học</h3>
                <p>Giúp quản lý các phòng học, giảng đường và phòng thí nghiệm, bao gồm việc đặt lịch, phân bổ sử dụng và quản lý tài nguyên trong phòng.</p>
            </div>
        </div>
        <div class="service-item">
            <img src="img/maintenance-repair.jpg" alt="Bảo Trì và Sửa Chữa">
            <div>
                <h3>Bảo Trì và Sửa Chữa</h3>
                <p>Cung cấp dịch vụ bảo trì, sửa chữa định kỳ và khẩn cấp đối với các thiết bị, phòng học, giảng đường, giúp đảm bảo hoạt động liên tục.</p>
            </div>
        </div>
        <div class="service-item">
            <img src="img/reporting.jpg" alt="Thống Kê và Báo Cáo">
            <div>
                <h3>Thống Kê và Báo Cáo</h3>
                <p>Cung cấp các báo cáo và thống kê chi tiết về tình trạng sử dụng và bảo trì cơ sở vật chất, giúp dễ dàng theo dõi và quản lý.</p>
            </div>
        </div>
    </div>
</section>


        <section id="faq">
            <h2>Câu Hỏi Thường Gặp</h2>
            <div class="faq-container">
                <div class="faq-item">
                    <img src="img/đăngkyjj.png" alt="Icon 1">
                    <div>
                        <h3>Làm thế nào để đăng ký sử dụng thiết bị?</h3>
                        <p>Để đăng ký sử dụng thiết bị, bạn cần đăng nhập vào hệ thống và chọn thiết bị bạn muốn sử dụng từ mục “Danh Mục Thiết Bị”. Sau đó, bạn có thể đặt lịch sử dụng.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <img src="img/baocao.jpg" alt="Icon 2">
                    <div>
                        <h3>Hệ thống có hỗ trợ báo cáo không?</h3>
                        <p>Có, hệ thống cung cấp các báo cáo chi tiết về tình trạng sử dụng, bảo trì và sửa chữa cơ sở vật chất, giúp bạn dễ dàng theo dõi và ra quyết định.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <img src="img/baotri.png" alt="Icon 3">
                    <div>
                        <h3>Thời gian bảo trì thiết bị là bao lâu?</h3>
                        <p>Thời gian bảo trì thiết bị tùy thuộc vào loại thiết bị và mức độ sửa chữa. Chúng tôi cung cấp bảo trì định kỳ hàng tháng và bảo trì khẩn cấp khi có sự cố.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <img src="img/suachua.jpg" alt="Icon 4">
                    <div>
                        <h3>Làm thế nào để yêu cầu bảo trì hoặc sửa chữa?</h3>
                        <p>Bạn có thể yêu cầu bảo trì hoặc sửa chữa thông qua hệ thống trực tuyến bằng cách điền vào mẫu yêu cầu trong mục “Yêu Cầu Bảo Trì” trên trang chủ.</p>
                    </div>
                </div>
            </div>
        </section>
        

        
        <!-- Đối tác -->
        <section id="partners">
            <h2>Đối Tác</h2>
            <p>Chúng tôi tự hào hợp tác với các đối tác hàng đầu trong ngành để mang đến những dịch vụ và giải pháp tốt nhất.</p>
        <div class="partner-list">
        <div class="partner-item">
            <img src="img/ktqd.jpg" alt="Đối tác 1">
            <p><strong>KTQD</strong>: Công ty cung cấp giải pháp quản lý tối ưu cho các doanh nghiệp.</p>
        </div>
        <div class="partner-item">
            <img src="img/bkhoa.png" alt="Đối tác 2">
            <p><strong>BKhoa</strong>: Đại học Bách Khoa Hà Nội, đối tác giáo dục uy tín trong lĩnh vực công nghệ.</p>
        </div>
        <div class="partner-item">
            <img src="img/pdu.jpg" alt="Đối tác 3">
            <p><strong>PDU</strong>: Công ty PDU chuyên cung cấp các dịch vụ đào tạo và phát triển nguồn nhân lực.</p>
        </div>
         </div>
       </section>

        <section id="feedback">
            <h2>Phản Hồi Người Dùng</h2>
            <p>Chúng tôi rất vui nhận được ý kiến đóng góp từ bạn để cải thiện dịch vụ. Vui lòng điền vào mẫu dưới đây.</p>
            <form action="#" method="post" class="feedback-form">
                <div class="form-group">
                    <label for="rating">Đánh giá dịch vụ:</label>
                    <select id="rating" name="rating" class="form-control" required>
                        <option value="excellent">Tuyệt vời</option>
                        <option value="good">Tốt</option>
                        <option value="average">Trung bình</option>
                        <option value="poor">Kém</option>
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="feedback-message">Lời nhắn:</label>
                    <textarea id="feedback-message" name="feedback-message" placeholder="Nhập phản hồi của bạn" class="form-control" required></textarea>
                </div>
                
                <button type="submit" class="btn-submit">Gửi Phản Hồi</button>
            </form>
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
</body>
</html>
