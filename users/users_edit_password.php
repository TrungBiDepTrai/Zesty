<!doctype html>
<html lang="en">
<head>
	<?php 
		include_once('../components/connection.php');
		include_once('../components/assets.php');
		include_once('../components/header_user.php');
        if(!isset($_SESSION["error_message"])){
			$_SESSION["error_message"] = "";
		}

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$MatKhauCu = $_POST["matkhaucu"];
			$MatKhauMoi1 = $_POST["matkhaumoi1"];
			$MatKhauMoi2 = $_POST["matkhaumoi2"];
            if ($MatKhauMoi1 == $MatKhauMoi2) {
				// Kiểm tra mật khẩu cũ
				$checkOldPassword = "SELECT * FROM thanhvien WHERE MaThanhVien = '$MaThanhVien' AND MatKhau = '$MatKhauCu'";
				$result = $conn->query($checkOldPassword);
		
				if ($result->num_rows > 0) {
					// Mật khẩu cũ đúng, cập nhật mật khẩu mới
					$updatePassword = "UPDATE thanhvien SET MatKhau = '$MatKhauMoi1' WHERE MaThanhVien = '$MaThanhVien'";
					$conn->query($updatePassword);
		
					if ($conn->error == "") {
						$_SESSION["error_message"] = "Cập nhật thành công!";
					} else {
						$_SESSION["error_message"] = "Lỗi khi cập nhật mật khẩu: " . $conn->error;
					}
				} else {
					$_SESSION["error_message"] = "Mật khẩu cũ không chính xác!";
				}
			} else {
				$_SESSION["error_message"] = "Vui lòng nhập chính xác mật khẩu mới!";
			}
		}else{

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
								<h1>Đổi mật khẩu</h1>
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
						<h2 class="section-title">Đổi mật khẩu</h2>
                        <h4 class="section-title"><?php echo $_SESSION["error_message"];?></h4>
                        <form action="" method="post">
						<div class="row">
							<div class="mb-3">
								<label for="">Mật khẩu cũ</label>
								<input type="password" class="form-control" aria-label="First name" placeholder="Nhập mật khẩu cũ" name="matkhaucu">
							</div>
							<div class="mb-3">
								<label for="">Mật khẩu mới</label>
								<input type="password" class="form-control" aria-label="First name" placeholder="Nhập mật khẩu mới" name="matkhaumoi1">
							</div>
                            <div class="mb-3">
								<label for="">Mật khẩu lại mới</label>
								<input type="password" class="form-control" aria-label="First name" placeholder="Nhập mật lại khẩu mới" name="matkhaumoi2">
							</div>
							<div class="mb-3">
								<button class="btn btn-outline-success" type="submit">Cập nhật</button>
							</div>
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
