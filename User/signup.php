<?php 
            include("control.php");
            $get_Data = new data_user();

            if (isset($_POST['submit'])) {
                if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
                    if ($_POST['password'] != $_POST['confirm_password']) {
                        echo "<script>alert('Passwords do not match')</script>";
                    } else {
                        $select = $get_Data->select_user($_POST['username']);
                        $check = 0;
                        foreach ($select as $sel) {
                            $check++;
                        }
                        if ($check >= 1) {
                            echo "<script>alert('Tên đăng nhập đã tồn tại')</script>";
                        } else {
                        $hashed_password = $_POST['password'];
                
                // Chèn người dùng mới vào cơ sở dữ liệu
                    $insert = $get_Data->insert_User($_POST['username'], $hashed_password);
                        if ($insert) {
                                echo "<script>alert('Đăng ký thành công'); window.location='signin.php';</script>";
                            } else {
                                echo "<script>alert('Đăng ký thất bại')</script>";
                            }
                        }
                    }
                } else {
                    echo "<script>alert('Vui lòng nhập đủ thông tin')</script>";
                }
            }
        ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/dangnhap.css">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/img_landing/favicon.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="landing">
    <div class="landing-decoration"></div>

    <div class="landing-info">
        <div class="logo">
            <img src="img/logoql.jpg" alt="Phương Đông" />
        </div>
        <h2 class="landing-info-pretitle">Chào mừng bạn đã tới</h2>
        <h1 class="landing-info-title">Phương Đông</h1>
        <p class="landing-info-text">Trang đăng ký của Phương Đông</p>
        <ul class="tab-switch">
            <li class="tab-switch-button login-register-form-trigger"><a href="index.php">Trang Chủ</a></li>
            <li class="tab-switch-button login-register-form-trigger"><a href="signin.php">Đăng Nhập</a></li>
        </ul>
    </div>

    <div class="landing-form">
        <div class="form-box login-register-form-element">
            <img class="form-box-decoration" src="rocket.png" alt="Rocket">
            <h2 class="form-box-title">Đăng ký</h2>

            <form class="form" method="POST" action="">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token']; ?>">

                <div class="form-row">
                    <div class="form-item">
                        <div class="form-input">
                            <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-item">
                        <div class="form-input">
                            <input type="password" name="password" id="password" class="form-control" placeholder="Mật khẩu" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-item">
                        <div class="form-input">
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Xác nhận mật khẩu" required>
                        </div>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-item">
                        <button class="button medium primary" type="submit" name="submit">Đăng ký ngay!</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
