<!doctype html>
<html lang="en">
<head>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <?php
        include_once('../components/assets.php');
		include_once('../components/connection.php');
		include_once('../components/header_user.php');
		$sql = "SELECT
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
		sanpham ON giohang.MaSanPham = sanpham.MaSanPham;";

		$result = $conn->query($sql) or die("Can't get recordset");
		var_dump($_GET['MaSanPham']);
		if(isset($_GET['action'])){
			var_dump($_POST);
			exit;
		}

    ?>
		<title></title>
	</head>

	<body>

			<div class="hero">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-lg-5">
							<div class="intro-excerpt">
								<h1>Cart</h1>
							</div>
						</div>
						<div class="col-lg-7">
							
						</div>
					</div>
				</div>
			</div>
		<!-- End Hero Section -->

		<form class="col-md-12" action="users_cart.php?action=submit" method="post">

		<div class="untree_co-section before-footer-section">
            <div class="container">
              <div class="row mb-5">
                
                  <div class="site-blocks-table">
                    <table class="table">
                      <thead>
                        <tr>
                          <th class="product-thumbnail">Ảnh</th>
                          <th class="product-name">Sản Phẩm</th>
                          <th class="product-price">Giá</th>
                          <th class="product-quantity">Số Lượng</th>
                          <th class="product-remove">Xoá</th>
                        </tr>
                      </thead>
                      <tbody>
                        
						<?php
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									?>
									<tr>
										<td class="product-thumbnail">
											<img src="../images/Product/<?php echo $row["Anh"] ?>" alt="Image" class="img-fluid">
										</td>
										<td class="product-name">
											<h2 class="h5 text-black"><?php echo $row["TenSanPham"] ?></h2>
										</td>
										<td><?php echo $row["Gia"] ?> VNĐ</td>
										
										<td>
											<div class="input-group mb-3 d-flex align-items-center quantity-container" style="max-width: 100px;">
												<input name="quantity[<?php echo $row["MaThanhVien"]?>]" type="text" class="form-control text-center quantity-amount" value="<?php echo $row["SoLuong"] ?>" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
											</div>
										</td>
										
										<td><a href="#" class="btn btn-black btn-sm">X</a></td>
									</tr>
									<?php
								}
							} else {
								echo "<tr><td colspan=5>Tap ket qua rong</td></tr>";
							}
						?>
                      </tbody>
                    </table>
                  </div>
                
              </div>
        
              <div class="row">
                <div class="col-md-6">
                  <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <button name="update_click" class="btn btn-black btn-sm btn-block">Cập nhật giỏ</button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-outline-black btn-sm btn-block">Tiếp tục lướt</button>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <label class="text-black h4" for="coupon">Coupon</label>
                      <p>Nhập coupon code nếu bạn có.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                      <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                      <button class="btn btn-black">Nhập</button>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                    <div class="col-md-7">
                      <div class="row">
                        <div class="col-md-12 text-right border-bottom mb-5">
                          <h3 class="text-black h4 text-uppercase">Tổng</h3>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <div class="col-md-6">
                          <span class="text-black">Subtotal</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black"></strong>
                        </div>
                      </div>
                      <div class="row mb-5">
                        <div class="col-md-6">
                          <span class="text-black">Tổng</span>
                        </div>
                        <div class="col-md-6 text-right">
                          <strong class="text-black">$230.00</strong>
                        </div>
                      </div>
        
                      <div class="row">
                        <div class="col-md-12">
                          <button class="btn btn-black btn-lg py-3 btn-block" type="submit">Proceed To Checkout</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
		</form>

		<!-- Start Footer Section -->
		<footer class="footer-section">
			<div class="container relative">

				<div class="sofa-img">
					<img src="images/sofa.png" alt="Image" class="img-fluid">
				</div>

				<div class="row">
					<div class="col-lg-8">
						<div class="subscription-form">
							<h3 class="d-flex align-items-center"><span class="me-1"><img src="images/envelope-outline.svg" alt="Image" class="img-fluid"></span><span>Subscribe to Newsletter</span></h3>

							<form action="#" class="row g-3">
								<div class="col-auto">
									<input type="text" class="form-control" placeholder="Enter your name">
								</div>
								<div class="col-auto">
									<input type="email" class="form-control" placeholder="Enter your email">
								</div>
								<div class="col-auto">
									<button class="btn btn-primary">
										<span class="fa fa-paper-plane"></span>
									</button>
								</div>
							</form>

						</div>
					</div>
				</div>

				<div class="row g-5 mb-5">
					<div class="col-lg-4">
						<div class="mb-4 footer-logo-wrap"><a href="#" class="footer-logo">Furni<span>.</span></a></div>
						<p class="mb-4">Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam vulputate velit imperdiet dolor tempor tristique. Pellentesque habitant</p>

						<ul class="list-unstyled custom-social">
							<li><a href="#"><span class="fa fa-brands fa-facebook-f"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-twitter"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-instagram"></span></a></li>
							<li><a href="#"><span class="fa fa-brands fa-linkedin"></span></a></li>
						</ul>
					</div>

					<div class="col-lg-8">
						<div class="row links-wrap">
							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">About us</a></li>
									<li><a href="#">Services</a></li>
									<li><a href="#">Blog</a></li>
									<li><a href="#">Contact us</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Support</a></li>
									<li><a href="#">Knowledge base</a></li>
									<li><a href="#">Live chat</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Jobs</a></li>
									<li><a href="#">Our team</a></li>
									<li><a href="#">Leadership</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>

							<div class="col-6 col-sm-6 col-md-3">
								<ul class="list-unstyled">
									<li><a href="#">Nordic Chair</a></li>
									<li><a href="#">Kruzo Aero</a></li>
									<li><a href="#">Ergonomic Chair</a></li>
								</ul>
							</div>
						</div>
					</div>

				</div>

				<div class="border-top copyright">
					<div class="row pt-4">
						<div class="col-lg-6">
							<p class="mb-2 text-center text-lg-start">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a> Distributed By <a hreff="https://themewagon.com">ThemeWagon</a>  <!-- License information: https://untree.co/license/ -->
            </p>
						</div>

						<div class="col-lg-6 text-center text-lg-end">
							<ul class="list-unstyled d-inline-flex ms-auto">
								<li class="me-4"><a href="#">Terms &amp; Conditions</a></li>
								<li><a href="#">Privacy Policy</a></li>
							</ul>
						</div>

					</div>
				</div>

			</div>
		</footer>
		<!-- End Footer Section -->	

		
						
		<script src="js/bootstrap.bundle.min.js"></script>
		<script src="js/tiny-slider.js"></script>
		<script src="js/custom.js"></script>
	</body>

</html>
