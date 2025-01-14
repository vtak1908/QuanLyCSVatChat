<?php
include("connect.php");

class data_user
{
    // Hàm thêm tài sản
    public function insert_assets($name, $img, $type, $status, $location, $purchaDate)
    {
        global $conn;
        $sql = "INSERT INTO assets (Name, Img, Type, Status, Location, PurchaDate) 
                VALUES ('$name', '$img', '$type', '$status', '$location', '$purchaDate')";
        $run = mysqli_query($conn, $sql);

        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$run) {
            echo "Error: " . mysqli_error($conn);
        }

        return $run;
    }
   
    public function select_admin($user)
    {
        global $conn;
        $sql = "SELECT * FROM `user` WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    
    public function login($user, $pass)
    {
        global $conn;
        // Chuẩn bị câu lệnh SQL với tham số đầu vào
        $sql = "SELECT * FROM user WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        
        // Lấy kết quả trả về
        $result = $stmt->get_result();
        
        // Kiểm tra nếu có người dùng tồn tại
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            
            // Xác minh mật khẩu nhập vào với mật khẩu đã mã hóa trong cơ sở dữ liệu
            if ($pass == $row['password']) {
                // Kiểm tra vai trò của người dùng
                if ($row['role'] === 'admin') {
                    return $row; // Đăng nhập thành công
                } else {
                    return false; // Không phải admin
                }
            }
        }
        return false; // Đăng nhập thất bại
    }
    public function select_user_top()
    {
        global $conn;
        $sql = "SELECT * FROM `user` ORDER BY `user`.`Id_User` DESC";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    // Hàm lấy danh sách tài sản
    public function select_Assets()
    {
        global $conn;
        $sql = "SELECT * FROM assets";
        $run = mysqli_query($conn, $sql);
        return $run;  // Trả về kết quả truy vấn
    }
    public function search_Assets($keyword) {
        global $conn;
        $sql = "SELECT * FROM assets WHERE Name LIKE ? OR Type LIKE ? OR Location LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchKey = "%" . $keyword . "%";
        $stmt->bind_param("sss", $searchKey, $searchKey, $searchKey);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Hàm xóa tài sản
    public function delete_assets($id_con)
{
    global $conn;
    
    // Xóa bản ghi trong bảng maintenance trước
    $sql_maintenance = "DELETE FROM maintenance WHERE Id_Assets = ?";
    $stmt_maintenance = mysqli_prepare($conn, $sql_maintenance);
    mysqli_stmt_bind_param($stmt_maintenance, "i", $id_con);
    
    // Kiểm tra việc xóa bản ghi maintenance
    if (!mysqli_stmt_execute($stmt_maintenance)) {
        echo "Error deleting from maintenance: " . mysqli_error($conn);
        mysqli_stmt_close($stmt_maintenance);
        return false;
    }
    mysqli_stmt_close($stmt_maintenance);

    // Sau đó xóa bản ghi trong bảng assets
    $sql_assets = "DELETE FROM assets WHERE Id_Assets = ?";
    $stmt_assets = mysqli_prepare($conn, $sql_assets);
    mysqli_stmt_bind_param($stmt_assets, "i", $id_con);

    // Kiểm tra việc xóa bản ghi trong bảng assets
    if (!mysqli_stmt_execute($stmt_assets)) {
        echo "Error deleting from assets: " . mysqli_error($conn);
        mysqli_stmt_close($stmt_assets);
        return false;
    }
    mysqli_stmt_close($stmt_assets);
    
    return true;
}


    public function select_AssetById($id)
    {
        global $conn;
        $sql = "SELECT * FROM assets WHERE Id_Assets = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        mysqli_stmt_close($stmt);
        return $result;
    }
    // Hàm cập nhật tài sản
    public function update_assets($id_con, $name, $img, $type, $status, $location, $purchaDate)
    {
        global $conn;
        $sql = "UPDATE assets SET
                    Name = '$name', 
                    Img = '$img', 
                    Type = '$type', 
                    Status = '$status', 
                    Location = '$location', 
                    PurchaDate = '$purchaDate' 
                WHERE Id_Assets = '$id_con'";
        $run = mysqli_query($conn, $sql);

        // Kiểm tra nếu có lỗi trong truy vấn
        if (!$run) {
            echo "Error: " . mysqli_error($conn);
        }

        return $run;
    }
    //bao cao
    public function select_AssetsStatus()
    {
        global $conn;
        $sql = "SELECT * FROM assets WHERE Status = 'tốt'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }

    // ham bao tri 
    public function select_Maintenance()
    {
        global $conn;
        $sql = "SELECT m.Id, m.MaintenanceDate, m.Description, m.MaintenanceStatus, a.Name AS AssetName
                FROM maintenance m
                JOIN assets a ON m.Id_Assets = a.Id_Assets";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function select_Maintenance_By_Date($start_date, $end_date)
    {
        global $conn;
        $sql = "SELECT m.Id, m.MaintenanceDate, m.Description, m.MaintenanceStatus, a.Name AS AssetName
                FROM maintenance m
                JOIN assets a ON m.Id_Assets = a.Id_Assets
                WHERE m.MaintenanceDate BETWEEN '$start_date' AND '$end_date'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function delete_Maintenance($id)
    {
        global $conn;
        $sql = "DELETE FROM maintenance WHERE Id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
    public function update_Maintenance_Status($id, $status)
{
    global $conn;
    $sql = "UPDATE maintenance SET MaintenanceStatus = ? WHERE Id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $status, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

    public function countProcessedMaintenance()
    {
        global $conn;
        $sql = "SELECT COUNT(*) as count FROM maintenance WHERE MaintenanceStatus = 'Hoàn thành'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }

    public function countUnprocessedMaintenance()
    {
        global $conn;
        $sql = "SELECT COUNT(*) as count FROM maintenance WHERE MaintenanceStatus = 'Đang xử lý'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['count'];
    }
    
    // nguoi dung 
   // Phương thức lấy tất cả người dùng
public function select_all_users()
{
    global $conn;
    $sql = "SELECT * FROM user";  // Lấy tất cả người dùng
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->get_result(); // Trả về kết quả của truy vấn
}
public function delete_User($id)
{
    global $conn;
    $sql = "DELETE FROM user WHERE Id_User = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}

public function update_User($id, $username, $password, $role)
{
    global $conn;
    $sql = "UPDATE users SET username = ?, password = ?, role = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $password, $role, $id);
    $result = $stmt->execute();
    $stmt->close();
    return $result;
}


}
?>
