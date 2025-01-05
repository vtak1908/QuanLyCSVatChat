<?php
session_start();

include("connect.php");
include("control.php");

$user = new data_user();

// Xử lý thêm tài sản
if (isset($_POST['action']) && $_POST['action'] == 'insert') {
    $name = $_POST['Name'];
    $img = $_FILES['Image'];
    $type = $_POST['Type'];
    $status = $_POST['Status'];
    $location = $_POST['Location'];
    $purchadate = isset($_POST['PurchaDate']) ? $_POST['PurchaDate'] : ''; // Kiểm tra sự tồn tại của trường

    if (isset($img['name']) && $img['error'] === 0) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileName = iconv('UTF-8', 'ASCII//TRANSLIT', $img['name']);
        $fileName = preg_replace('/[^A-Za-z0-9.\-]/', '_', $fileName);
        $fileTmpPath = $img['tmp_name'];
        $fileDest = $uploadDir . $fileName;

        if (move_uploaded_file($fileTmpPath, $fileDest)) {
            $user->insert_assets($name, $fileName, $type, $status, $location, $purchadate);
            echo "File uploaded successfully: $fileDest";
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "No file uploaded or upload error.";
    }
}

// Xóa tài sản
if (isset($_POST['action']) && $_POST['action'] == 'delete') {
    $id = $_POST['Id_Assets'];
    $result = $user->delete_assets($id);
}

$assets = $user->select_Assets();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/taisan.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Quản Lý Tài Sản</title>
</head>
<body>
<header>
        <h1>Quản Lý Tài Sản</h1>
        <nav>
            <div class="nav-container">
                <div class="logo">
                    <a href="index.html">
                        <img src="img/logoql.jpg" alt="logo">
                    </a>
                </div>
                <ul class="nav-links">
                    <li><a href="trangchu.php">Trang Chủ</a></li>
                    <li><a href="baotri.php">Bảo trì</a></li>
                    <li><a href="baocao.php">Báo Cáo</a></li>
                    <li><a href="lienhe.php">Liên Hệ</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
    <section id="addAsset">
        <h2>Thêm Tài Sản Mới</h2>
        <form id="addAssetForm" method="POST" enctype="multipart/form-data">
            <input type="text" name="Name" placeholder="Tên tài sản" required>
            <input type="file" name="Image" required>
            <input type="text" name="Type" placeholder="Loại tài sản" required>
            <input type="text" name="Status" placeholder="Tình trạng" required>
            <input type="text" name="Location" placeholder="Vị trí" required>
            <input type="date" name="PurchaDate" required>
            <button type="submit" name="action" value="insert">Thêm Tài Sản</button>
        </form>
    </section>

    <section id="assetList">
        <h2>Danh Sách Tài Sản</h2>
        <table border="1">
            <thead>
                <tr>
                    <th>Tên Tài Sản</th>
                    <th>Hình ảnh</th>
                    <th>Loại tài sản</th>
                    <th>Tình trạng</th>
                    <th>Vị trí</th>
                    <th>Ngày nhập</th>
                    <>Thao tác</
                </tr>
            </thead>
            <tbody>
                <?php
                if ($assets) {
                    while ($row = mysqli_fetch_assoc($assets)) {
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td><img src='uploads/" . $row['Img'] . "' width='100'></td>";
                        echo "<td>" . $row['Type'] . "</td>";
                        echo "<td>" . $row['Status'] . "</td>";
                        echo "<td>" . $row['Location'] . "</td>";
                        echo "<td>" . $row['PurchaDate'] . "</td>";
                        echo "<td>
                                <form method='POST'>
                                    <input type='hidden' name='Id_Assets' value='" . $row['Id_Assets'] . "'>
                                    <button type='submit' name='action' value='delete'>Xóa</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>Không có tài sản nào!</td></tr>";
                }
                ?>
            </tbody>
        </table>
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
