<!DOCTYPE html>
<html lang="en">
<head>
    <title>Xoá Người Dùng - Admin Zesty</title>
    <?php
        include_once('../components/assets_admin.php');
        include_once('../components/connection.php');
    ?>
</head>

<body class="g-sidenav-show  bg-gray-100">
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Kiểm tra xem người dùng có tồn tại không
            $check_query = "SELECT * FROM thanhvien WHERE MaThanhVien = '$id'";
            $check_result = mysqli_query($conn, $check_query);

            if (mysqli_num_rows($check_result) > 0) {
                // Người dùng tồn tại, thực hiện xoá
                $delete_query = "DELETE FROM thanhvien WHERE MaThanhVien = '$id'";
                $delete_result = mysqli_query($conn, $delete_query);

                if ($delete_result) {
                    echo "<div class='container mt-5'>";
                    echo "<h3>Xoá người dùng thành công!</h3>";
                    echo "<p><a href='admin_users_list.php'>Quay lại danh sách người dùng</a></p>";
                    echo "</div>";
                } else {
                    echo "<div class='container mt-5'>";
                    echo "<h3>Lỗi! Không thể xoá người dùng.</h3>";
                    echo "<p><a href='admin_users_list.php'>Quay lại danh sách người dùng</a></p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='container mt-5'>";
                echo "<h3>Người dùng không tồn tại!</h3>";
                echo "<p><a href='admin_users_list.php'>Quay lại danh sách người dùng</a></p>";
                echo "</div>";
            }
        } else {
            echo "<div class='container mt-5'>";
            echo "<h3>Lỗi! Không có thông tin người dùng để xoá.</h3>";
            echo "<p><a href='admin_users_list.php'>Quay lại danh sách người dùng</a></p>";
            echo "</div>";
        }

        // Đóng kết nối
        mysqli_close($conn);
    ?>
</body>
</html>
