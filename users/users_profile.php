<!doctype html>
<html lang="en">
<head>
	<?php 
		include_once('../components/connection.php');
		include_once('../components/assets.php');
		include_once('../components/header_user.php');
        $sql = "SELECT * FROM thanhvien WHERE MaThanhVien = $MaThanhVien";
        $result = $conn->query($sql) or die("Can't get recordset");
		$row = $result->fetch_assoc();
		if(!isset($_SESSION["error_message"])){
			$_SESSION["error_message"] = "";
		}
	?>
	<title>Nguyên liệu</title>
</head>

	<body>

			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Hồ sơ</h1>
							</div>
						</div>
						<div class="col-lg-7">
						</div>
					</div>
				</div>
			</div>

            <div class="why-choose-section">
			<div class="container">
				<div class="row justify-content-between">
					<div class="col-lg-6">
						<h2 class="section-title">Thông tin</h2>
						<h4 class="section-title"><?php echo $_SESSION["error_message"];?></h4>
                        <form action="" method="post">
							<div class="row">
							<div class="col">
								<label for="">Họ tên</label>
								<input type="text" class="form-control" value="<?=$row['HoTen']?>" aria-label="First name" disabled>
							</div>
							<div class="col">
								<label for="">SĐT</label>
								<input type="text" class="form-control" value="<?=$row['SDT']?>" aria-label="Last name" disabled>
							</div>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Email</label>
								<input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row['Email']?>" disabled>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Địa chỉ</label>
								<input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row['DiaChiNhanHang']?>" disabled>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Ngày sinh</label>
								<input type="date" class="form-control" id="formGroupExampleInput" value="<?=$row['NgaySinh']?>" disabled>
							</div>
							<div class="mb-3">
								<span><a href="users_profile_edit.php?id=<?php echo $_SESSION["MaThanhVien"]?>" class="btn">Thay đổi</a></span>
								<span><a href="users_edit_password.php?id=<?php echo $_SESSION["MaThanhVien"]?>" class="btn">Đổi mật khẩu</a></span>
							</div>
                        </form>
					</div>

					<div class="col-lg-5">
   		 <form action="" method="post">
        <h2 class="section-title">Lịch sử mua hàng</h2>
        <table class="table">
            <thead>
                <tr>	
                    <th scope="col">Đơn hàng</th>
                    <th scope="col">Ngày đặt</th>
                    <th scope="col">Trạng thái</th>
                    <th scope="col">Tổng giá</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sqlDH = "SELECT donhang.MaDonHang, donhang.ThoiGianDatHang, donhang.TrangThai, 
				SUM(sanpham.Gia * giohang.SoLuong) AS TongGia
				FROM donhang
				LEFT JOIN giohang ON donhang.MaGioHang = giohang.MaGioHang
				LEFT JOIN sanpham ON giohang.MaSanPham = sanpham.MaSanPham
				WHERE donhang.MaThanhVien = $MaThanhVien
				GROUP BY donhang.MaDonHang";


                $resultDH = $conn->query($sqlDH) or die("Can't get recordset");
                if ($resultDH->num_rows > 0) {
                    while ($row = $resultDH->fetch_assoc()) {
                        ?>
                        <tr>
                            <th><?= $row["MaDonHang"] ?></th>
                            <th><?= $row["ThoiGianDatHang"] ?></th>
							<th>
								<?php
									$trangThai = $row["TrangThai"];
									if ($trangThai == 0) {
										echo "Chờ lấy hàng";
									} elseif ($trangThai == 1) {
										echo "Đang giao";
									} elseif ($trangThai == 2) {
										echo "Đã nhận hàng";
									} elseif ($trangThai == 3) {
										echo "Hủy đơn hàng";
									} else {
										echo "Trạng thái không xác định";
									}
								?>
							</th>

                            <th><?= number_format($row["TongGia"], 0, ',', '.') ?> VND</th>
                        </tr>
                        <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </form>
</div>



				</div>
			</div>
		</div>

		
    </div>


		<?php
		include_once("../components/tail_user.php");
		unset($_SESSION["error_message"]);
		?>
	</body>

</html>
