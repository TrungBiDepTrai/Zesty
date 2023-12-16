<?php
// update_cart.php

include_once('../components/assets.php');
include_once('../components/header_user.php');

if (isset($_POST['update_cart'])) {
    // Lặp qua từng sản phẩm trong giỏ hàng
    foreach ($_POST['action'] as $cartItemId => $action) {
        $quantity = $_POST['quantity'][$cartItemId];

        // Thực hiện các thao tác cần thiết, ví dụ: cập nhật số lượng trong database
        // Ví dụ:
        // $sqlUpdate = "UPDATE giohang SET SoLuong = $quantity WHERE MaGioHang = $cartItemId";
        // $resultUpdate = $conn->query($sqlUpdate);

        // Bạn cần thay đổi câu lệnh SQL trên để phản ánh vào cơ sở dữ liệu của bạn

        // Sau đó, cập nhật lại tổng và hiển thị
        $sqlSelect = "SELECT
            giohang.MaGioHang,
            thanhvien.MaThanhVien,
            sanpham.Anh,
            sanpham.TenSanPham,
            sanpham.Gia,
            giohang.SoLuong,
            (giohang.SoLuong * sanpham.Gia) AS Tong
            FROM
            giohang
            JOIN
            thanhvien ON giohang.MaThanhVien = thanhvien.MaThanhVien
            JOIN
            sanpham ON giohang.MaSanPham = sanpham.MaSanPham
            WHERE giohang.MaGioHang = $cartItemId";

        $resultSelect = $conn->query($sqlSelect);

        if ($resultSelect->num_rows > 0) {
            $row = $resultSelect->fetch_assoc();
            $updatedTotal = $quantity * $row["Gia"];
            echo $updatedTotal . " VNĐ";  // Hiển thị giá trị cập nhật
        }
    }
}
?>
