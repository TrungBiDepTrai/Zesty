-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 17, 2023 lúc 07:26 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `zesty`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `MaAdmin` int(11) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TenDangNhap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`MaAdmin`, `MatKhau`, `TenDangNhap`) VALUES
(1, '123', 'quan');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `MaBlog` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `NoiDung` text DEFAULT NULL,
  `MaAdmin` int(11) DEFAULT NULL,
  `MaThanhVien` int(11) DEFAULT NULL,
  `NgayDang` date DEFAULT NULL,
  `AnhBlog` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `blog`
--

INSERT INTO `blog` (`MaBlog`, `Title`, `NoiDung`, `MaAdmin`, `MaThanhVien`, `NgayDang`, `AnhBlog`) VALUES
(1, 'Cách làm bánh mỳ', 'Bánh mỳ', NULL, 1, '2023-12-12', 'banhmy.png'),
(2, 'Bánh xèo', 'Cách làm bánh xèo', 1, NULL, '2023-12-08', 'banhxeo.png'),
(3, 'Cách làm bún bò Huế', 'Chỉ cần làm theo video là được', NULL, 4, '2023-12-12', 'bunbo.png'),
(5, 'Cách làm bánh crepe', 'Cách làm bánh crepe làm theo video là được', NULL, 1, '2023-12-16', 'Cách làm bánh crepe.jpg'),
(6, 'Cách làm bánh Doraemon', 'Cách làm bánh Doraemon là xem phim Doraemon là làm được thôi', NULL, 1, '2023-12-16', 'Cách làm bánh Doraemon.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `MaGioHang` int(11) NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaMoiSP` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
--

CREATE TABLE `danhgia` (
  `MaDanhGia` int(11) NOT NULL,
  `MaThanhVien` int(11) DEFAULT NULL,
  `TieuDe` varchar(255) DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `HaiLong` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhgia`
--

INSERT INTO `danhgia` (`MaDanhGia`, `MaThanhVien`, `TieuDe`, `NoiDung`, `HaiLong`) VALUES
(1, 1, 'Sản Phẩm', 'Rất Tuyệt', 1),
(2, 1, 'abcd', 'ádasdas', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `MaDanhMuc` int(11) NOT NULL,
  `TenDanhMuc` varchar(255) NOT NULL,
  `MoTa` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`MaDanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(1, 'Hoa Quả', 'Hoa Quả'),
(2, 'Rau củ', 'Rau củ'),
(3, 'Gia vị', 'Gia vị'),
(4, 'Thực phẩm đạm', 'Thực phẩm đạm'),
(5, 'Các loại hạt và ngũ cốc', 'Các loại hạt và ngũ cốc'),
(6, 'Dầu ăn và gia vị', 'Dầu ăn và gia vị'),
(7, 'Sản phẩm từ sữa', 'Sản phẩm từ sữa'),
(8, 'Đồ uống', 'Đồ uống');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donhang`
--

CREATE TABLE `donhang` (
  `MaDonHang` int(11) NOT NULL,
  `MaThanhVien` int(11) DEFAULT NULL,
  `MaGioHang` int(11) DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `ThoiGianDatHang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donhang`
--

INSERT INTO `donhang` (`MaDonHang`, `MaThanhVien`, `MaGioHang`, `TrangThai`, `ThoiGianDatHang`) VALUES
(1, 1, 1, 'Đã nhận hàng', '2023-12-10'),
(2, 1, 2, 'Đang Giao', '2023-12-12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `MaGioHang` int(11) NOT NULL,
  `MaThanhVien` int(11) DEFAULT NULL,
  `MaSanPham` int(11) DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `SoLuong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`MaGioHang`, `MaThanhVien`, `MaSanPham`, `TrangThai`, `SoLuong`) VALUES
(1, 1, 1, '1', 5),
(2, 1, 3, NULL, 1),
(3, 1, 6, NULL, 2),
(4, 1, 5, NULL, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuongthucthanhtoan`
--

CREATE TABLE `phuongthucthanhtoan` (
  `MaPhuongThuc` int(11) NOT NULL,
  `TenPhuongThuc` varchar(255) NOT NULL,
  `MaGioHang` int(11) DEFAULT NULL,
  `ThoiGianThanhToan` datetime DEFAULT NULL,
  `TongTien` decimal(10,2) DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `Gia` decimal(10,2) NOT NULL,
  `DinhLuong` varchar(255) DEFAULT NULL,
  `ThongTin` text DEFAULT NULL,
  `Anh` varchar(255) DEFAULT NULL,
  `TrangThai` varchar(50) DEFAULT NULL,
  `MaDanhMuc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `Gia`, `DinhLuong`, `ThongTin`, `Anh`, `TrangThai`, `MaDanhMuc`) VALUES
(1, 'Dây tây', 120000.00, 'Kg', 'Dâu tây mỹ đá Dalat', 'dautay.png', '1', 1),
(3, 'Táo', 100000.00, 'Kg', 'Táo', 'tao.png', '1', 1),
(4, 'Cam', 50000.00, 'Kg', 'Cam', 'cam.png', '1', 1),
(5, 'Chuối', 100000.00, 'Kg', 'Chuối', 'chuoi.png', '1', 1),
(6, 'Dưa Hấu', 30000.00, '1 quả', 'Dưa hấu tươi ngon, giàu nước.', 'dua_hau.jpg', '1', 1),
(7, 'Táo Fuji', 25000.00, '1 kg', 'Táo Fuji nhập khẩu, ngọt và giòn.', 'tao_fuji.jpg', '1', 1),
(8, 'Xoài Cát', 40000.00, '1 kg', 'Xoài Cát chín mọng, mùi thơm đặc trưng.', 'xoai_cat.jpg', '1', 1),
(9, 'Cam Sành', 35000.00, '1 kg', 'Cam Sành tươi ngon, giàu vitamin C.', 'cam_sanh.jpg', '1', 1),
(10, 'Cherry', 60000.00, '100g', 'Cherry đỏ mọng, ngọt ngào.', 'cherry.jpg', '1', 1),
(11, 'Mâm Xôi', 45000.00, '1 kg', 'Mâm xôi chín mọng, thơm ngon.', 'mam_xoi.jpg', '1', 1),
(12, 'Lựu', 55000.00, '1 kg', 'Quả lựu đỏ tươi, giàu chất dinh dưỡng.', 'lua.jpg', '1', 1),
(13, 'Dâu Tây', 70000.00, '500g', 'Dâu tây chín đỏ, ngọt và mềm.', 'dau_tay.jpg', '1', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhvien`
--

CREATE TABLE `thanhvien` (
  `MaThanhVien` int(11) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TenDangNhap` varchar(255) NOT NULL,
  `SDT` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `HoTen` varchar(255) DEFAULT NULL,
  `DiaChiNhanHang` text DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhvien`
--

INSERT INTO `thanhvien` (`MaThanhVien`, `MatKhau`, `TenDangNhap`, `SDT`, `Email`, `HoTen`, `DiaChiNhanHang`, `NgaySinh`) VALUES
(1, '1234', 'quanpham', '0123456789', 'quan1@gmail.com', 'Phạm Công Quân', 'Thanh Hoá', '2003-09-10'),
(3, '123', 'dung', '0123456789', 'dung@gmail.com', 'Nguyễn Văn Dũng', 'Hà Nội', NULL),
(4, '123', 'phucham', '0123456789', 'phuc@gmail.com', 'Nguyễn Hồng Phúc', 'Hà Nội', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`MaAdmin`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`MaBlog`),
  ADD KEY `MaAdmin` (`MaAdmin`),
  ADD KEY `MaThanhVien` (`MaThanhVien`);

--
-- Chỉ mục cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`MaDonHang`,`MaSanPham`,`MaGioHang`),
  ADD KEY `MaSanPham` (`MaSanPham`),
  ADD KEY `MaGioHang` (`MaGioHang`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`MaDanhGia`),
  ADD KEY `MaThanhVien` (`MaThanhVien`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`MaDonHang`),
  ADD KEY `MaThanhVien` (`MaThanhVien`),
  ADD KEY `MaGioHang` (`MaGioHang`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`MaGioHang`),
  ADD KEY `MaThanhVien` (`MaThanhVien`),
  ADD KEY `MaSanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD PRIMARY KEY (`MaPhuongThuc`),
  ADD KEY `MaGioHang` (`MaGioHang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `MaDanhMuc` (`MaDanhMuc`);

--
-- Chỉ mục cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  ADD PRIMARY KEY (`MaThanhVien`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `MaAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `MaBlog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `MaDanhGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `MaDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `donhang`
--
ALTER TABLE `donhang`
  MODIFY `MaDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `MaGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  MODIFY `MaPhuongThuc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `thanhvien`
--
ALTER TABLE `thanhvien`
  MODIFY `MaThanhVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`MaAdmin`) REFERENCES `admin` (`MaAdmin`),
  ADD CONSTRAINT `blog_ibfk_2` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`);

--
-- Các ràng buộc cho bảng `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`MaDonHang`) REFERENCES `donhang` (`MaDonHang`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`),
  ADD CONSTRAINT `ctdonhang_ibfk_3` FOREIGN KEY (`MaGioHang`) REFERENCES `giohang` (`MaGioHang`);

--
-- Các ràng buộc cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`);

--
-- Các ràng buộc cho bảng `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`),
  ADD CONSTRAINT `donhang_ibfk_2` FOREIGN KEY (`MaGioHang`) REFERENCES `giohang` (`MaGioHang`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`MaThanhVien`) REFERENCES `thanhvien` (`MaThanhVien`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `phuongthucthanhtoan`
--
ALTER TABLE `phuongthucthanhtoan`
  ADD CONSTRAINT `phuongthucthanhtoan_ibfk_1` FOREIGN KEY (`MaGioHang`) REFERENCES `giohang` (`MaGioHang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`MaDanhMuc`) REFERENCES `danhmuc` (`MaDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
