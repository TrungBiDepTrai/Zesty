<!doctype html>
<html lang="en">
<head>
	<?php 
		include_once('../components/connection.php');
		include_once('../components/assets.php');
		include_once('../components/header_user.php');
		$mathanhvien = $_GET['id'];
        $sql = "SELECT * FROM thanhvien WHERE MaThanhVien = $MaThanhVien";
        $result = $conn->query($sql) or die("Can't get recordset");
		$row = $result->fetch_assoc();
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
                        <form action="" method="post">
							<div class="row">
							<div class="col">
								<label for="">Họ tên</label>
								<input type="text" class="form-control" placeholder="<?=$row['HoTen']?>" aria-label="First name">
							</div>
							<div class="col">
								<label for="">SĐT</label>
								<input type="text" class="form-control" placeholder="<?=$row['SDT']?>" aria-label="Last name">
							</div>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Email</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?=$row['Email']?>">
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Email</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?=$row['DiaChiNhanHang']?>">
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Ngày sinh</label>
								<input type="text" class="form-control" id="formGroupExampleInput" placeholder="<?=$row['DiaChiNhanHang']?>">
							</div>
							<div class="mb-3">
								<button type="submit" class="btn btn-outline-success">Thay đổi</button>
								<button type="button" class="btn btn-outline-danger">Đổi mật khẩu</button>
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
											<th scope="col">Tổng</th>
											<th scope="col">Đánh giá</th>
										</tr>
									</thead>
									<tbody>
										<?php

										?>
									</tbody>
							</table>
						</form>
					</div>

				</div>
			</div>
		</div>

		
    </div>


		<?php include_once("../components/tail_user.php")?>
	</body>

</html>
