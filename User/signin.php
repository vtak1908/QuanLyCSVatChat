<?php
session_start(); ?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/dangnhap.css">
        <link rel="shortcut icon" type="image/x-icon" href="/assets/img_landing/favicon.png">
        <title>Đăng nhập - Phương Đông</title>
    </head>
    <body>
        <div class="landing">
            <div class="landing-info">
                <div class="logo">
                    <img src="img/logoql.jpg" alt="Phương Đông" />
                </div>
                <h2 class="landing-info-pretitle">Chào mừng bạn đã tới</h2>
                <h1 class="landing-info-title">Phương Đông</h1>
                <p class="landing-info-text">Trang đăng nhập của Phương Đông</p>
                <ul class="tab-switch">
                    <li class="tab-switch-button"><a href="index.php">Trang Chủ</a></li>
                    <li class="tab-switch-button"><a href="signup.php">Đăng Ký</a></li>
                </ul>
            </div>

            <div class="landing-form">
                <div class="form-box">
                    <img class="form-box-decoration" src="img/rocket.png" alt="Rocket">
                    <h2 class="form-box-title">Đăng nhập</h2>
                    
                    <!-- Form đăng nhập -->
                    <form class="form" method="POST" action="">
                        <div class="form-row">
                            <div class="form-item">
                                <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                                </div>
                        </div>

                        <div class="form-row">
                            <div class="form-item">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                            </div>
                        </div>

                        <div class="form-row space-between">
                            <div class="form-item">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">Ghi nhớ tôi</label>
                            </div>
                            <div class="form-item">
                                <a href="#">Quên mật khẩu?</a>
                            </div>
                        </div>

                        <div class="form-row">
                            <button class="button medium secondary" type="submit" name="submit">Đăng Nhập</button>
                        </div>
                    </form>
                    <?php
                                include("control.php");
                                $get_Data = new data_user();

                                if (isset($_POST['submit'])) {
                                    // Gọi hàm login để kiểm tra tên đăng nhập và mật khẩu
                                    $select = $get_Data->login($_POST['username'], $_POST['password']);
                                    
                                    if ($select) {
                                        // Đăng nhập thành công
                                        echo "<script>alert('Đăng nhập thành công'); window.location=('trangchu.php');</script>";
                                        // Lưu trữ thông tin người dùng trong session
                                        $_SESSION['user'] = $_POST['username'];
                                    } else {
                                        // Đăng nhập thất bại
                                        echo "<script>alert('Đăng nhập thất bại');</script>";
                                    }
                                }
                                                 ?>
                </div>
            </div>
        </div>
    </body>
</html>
