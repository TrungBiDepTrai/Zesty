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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ form
            $tieude = $_POST["tieude"];
            $noidung = $_POST["noidung"];
            $hailong = isset($_POST["flexRadioDefault"]) ? 1 : 0; // Nếu radio được chọn, $hailong = 1, ngược lại là 0
        
            // Kiểm tra và làm sạch dữ liệu trước khi sử dụng trong truy vấn để ngăn chặn tấn công SQL injection
            $tieude = mysqli_real_escape_string($conn, $tieude);
            $noidung = mysqli_real_escape_string($conn, $noidung);
        
            // Lấy ID của người đánh giá từ session (giả sử bạn đã lưu MaThanhVien trong session)
        
            // Thực hiện truy vấn để chèn đánh giá vào bảng danhgia
            $sqlInsert = "INSERT INTO danhgia (MaThanhVien, TieuDe, NoiDung, HaiLong) VALUES ('$MaThanhVien', '$tieude', '$noidung', '$hailong')";
            $conn->query($sqlInsert);
        
            if ($conn->error == "") {
                $_SESSION["error_message"] = "Đánh giá của bạn đã được gửi đi!";
            } else {
                $_SESSION["error_message"] = "Lỗi khi gửi đánh giá: " . $conn->error;
            }
        }
        
        // Đọc lại dữ liệu từ bảng danhgia sau khi thêm mới
        $sql = "SELECT * FROM danhgia";
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
						<h2 class="section-title">Đánh giá</h2>
                        <h4 class="section-title"><?php echo $_SESSION["error_message"];?></h4>
                        <form action="" method="post">
							<div class="mb-3">
								<label for="">Tiêu đề</label>
								<input type="text" class="form-control" aria-label="First name" name="tieude">
							</div>
							<div class="mb-3">
								<label for="">Nôi dung</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="noidung"></textarea>
							</div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Hài lòng
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Không hài long
                            </label>
                            </div>
							<div class="mb-3">
								<span><button type="submit" href="users_comment.php?id=<?php echo $_SESSION["MaThanhVien"]?>" class="btn">Gửi đi</button></span>
							</div>
                        </form>
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
