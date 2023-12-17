<!doctype html>
<html lang="en">
<head>
	<?php 
		include_once('../components/connection.php');
		include_once('../components/assets.php');
		include_once('../components/header_user.php');
		$mathanhvien = $_GET['id'];

		if($_SERVER["REQUEST_METHOD"] == "POST"){
			$HoTen = $_POST["hoten"];
			$SDT = $_POST["sdt"];
			$Email = $_POST["email"];
			$DiaChi = $_POST["diachi"];
			$NgaySinh = $_POST["ngaysinh"];

			$sqlEdit = "UPDATE thanhvien SET
						HoTen = '$HoTen',
						SDT = '$SDT',
						Email = '$Email',
						DiaChiNhanHang = '$DiaChi',
						NgaySinh = '$NgaySinh'
						WHERE MaThanhVien = $MaThanhVien";
			$conn->query($sqlEdit) or die($conn->error);
			if ($conn->error==""){
				$_SESSION["error_message"] = "Cập nhật thành công!";
				header("Location:users_profile.php?id=$MaThanhVien");
			} else {
				$_SESSION["error_message"]="Cập nhật không thành công!";
				header("Location:users_profile.php?id=$MaThanhVien");
			}
			$conn->close();
		}else{

		}
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
						<h2 class="section-title">Cập nhật thông tin</h2>
                        <form action="users_profile_edit.php?id=<?php echo $mathanhvien; ?>" method="post">
						<div class="row">
							<div class="col">
								<label for="">Họ tên</label>
								<input type="text" class="form-control" value="<?=$row['HoTen']?>" aria-label="First name" name="hoten">
							</div>
							<div class="col">
								<label for="">SĐT</label>
								<input type="text" class="form-control" value="<?=$row['SDT']?>" aria-label="Last name" name="sdt">
							</div>
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Email</label>
								<input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row['Email']?>" name="email">
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Email</label>
								<input type="text" class="form-control" id="formGroupExampleInput" value="<?=$row['DiaChiNhanHang']?>" name="diachi">
							</div>
							<div class="mb-3">
								<label for="formGroupExampleInput" class="form-label">Ngày sinh</label>
								<input type="date" class="form-control" id="formGroupExampleInput" value="<?=$row['NgaySinh']?>" name="ngaysinh">
							</div>
							<div class="mb-3">
							<span><button class="btn btn-outline-success" type="submit">Cập nhật</button></span>
							</div>
                        </form>
					</div>
				</div>
			</div>
		</div>

		
    </div>


		<?php include_once("../components/tail_user.php")?>
	</body>

</html>
