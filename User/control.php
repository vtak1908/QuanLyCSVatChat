<?php
include("connect.php");

class data_user
{
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
            return $row; // Đăng nhập thành công
        }
    }
    return false; // Login failed
    }

    // Phương thức kiểm tra xem người dùng đã tồn tại hay chưa
    public function select_user($user)
    {
        global $conn;
        $sql = "SELECT * FROM user WHERE username='$user'";
        $run = mysqli_query($conn, $sql);
        return $run;
    }
    public function insert_User($name, $pass)
    {
        global $conn;
    
        // Vai trò mặc định
        $role = 'user';
    
        // Chèn dữ liệu vào bảng
        $sql = "INSERT INTO user (username, password, role) VALUES ('$name', '$pass', '$role')";
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
    
}
?>
