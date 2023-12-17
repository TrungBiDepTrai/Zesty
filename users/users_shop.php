<!doctype html>
<html lang="en">
<head>
    <?php 
        include_once('../components/connection.php');
        include_once('../components/assets.php');
        include_once('../components/header_user.php');
        $item_per_page = !empty($_GET["per_page"]) ? $_GET['per_page'] : 4;
        $current_page = !empty($_GET["page"]) ? $_GET['page'] : 1;
        $offset = ($current_page - 1) * $item_per_page;
        $total = mysqli_query($conn, "SELECT * FROM sanpham");
        $total = $total->num_rows;
        $totalPage = ceil($total / $item_per_page);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        if (isset($_POST['add_to_cart'])) {
            $MaSanPham = $_POST['MaSanPham'];
            $SoLuong = $_POST['SoLuong'];

            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = array();
            }

            if (isset($_SESSION['cart'][$MaSanPham])) {
                $_SESSION['cart'][$MaSanPham]['SoLuong'] += $SoLuong;
            } else {
                $_SESSION['cart'][$MaSanPham] = array(
                    'SoLuong' => $SoLuong,
                );
            }
        }
    ?>
    <title>Nguyên liệu</title>
</head>
<style>
    .page_item {
        margin-right: 10px;
    }

    .page_item:hover {
        text-decoration: none;
    }

    strong {
        margin-right: 10px;
    }

    strong:hover {
        text-decoration: none;
    }

    .category {
        margin-bottom: 20px;
    }

    .li {
        text-decoration: none;
    }
</style>
<body>
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <h1>Shop</h1>
            </div>
        </div>
    </div>
    <table>
        <thead>

        </thead>

        <div class="untree_co-section product-section before-footer-section">
            <div class="container">
                <div class="row">
                    <div class="category">
                        <ul>
                            <?php
                            $sqlDM = "SELECT * FROM danhmuc";
                            $resultDM = $conn->query($sqlDM) or die("Can't get recordset");
                            if ($resultDM->num_rows > 0) {
                                while ($row = $resultDM->fetch_assoc()) {
                                    ?>
                                    <li>
                                        <a href="users_shop.php?category=<?php echo $row['MaDanhMuc']; ?>"><?php echo $row["TenDanhMuc"] ?></a>
                                    </li>
                                <?php
                                }
                            } else {
                                echo "<tr><td colspan=7>Tap ket qua rong</td></tr>";
                            }
                            ?>
                        </ul>
                    </div>

                    <?php
                    if (isset($_GET['category'])) {
                        $categoryID = $_GET['category'];
                        $sql = "SELECT * FROM sanpham WHERE MaDanhMuc = $categoryID ORDER BY MaSanPham ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                    } else {
                        $sql = "SELECT * FROM sanpham ORDER BY MaSanPham ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";
                    }

                    $result = $conn->query($sql) or die("Can't get recordset");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <div class="col-12 col-md-4 col-lg-3 mb-5">
                                <a class="product-item" href="add_to_cart.php?product_id=<?=$row["MaSanPham"]; ?>">
                                    <img src="../images/Product/<?php echo $row["Anh"] ?>" class="img-fluid product-thumbnail">
                                    <h3 class="product-title"><?php echo $row["TenSanPham"] ?></h3>
                                    <strong class="product-price"><?php echo number_format($row["Gia"]) ?>VNĐ</strong>
                                    <span class="icon-cross">
                                        <img src="../assets/images/cross.svg" class="img-fluid">
                                    </span>
                                </a>
                            </div>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan=7>Tap ket qua rong</td></tr>";
                    }
                    ?>

                </div>
                <?php
                for ($num = 1; $num <= $totalPage; $num++) {
                    ?>
                    <?php
                    if ($num != $current_page) {
                        ?>
                        <a class="page_item" href="?per_page=<?=$item_per_page?>&page=<?=$num?>"><?=$num?></a>
                    <?php
                    } else {
                        ?>
                        <strong><?=$num?></strong>
                    <?php
                    }
                    ?>
                <?php
                }
                ?>
            </div>
        </div>
        <footer class="footer-section">
            <div class="container relative">
                <div class="sofa-img">
                    <img src="../images/Product/cuoitrang.png" alt="Image" class="img-fluid">
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="subscription-form">
                            <h3 class="d-flex align-items-center">
                                <span class="me-1">
                                    <img src="../assets/images/envelope-outline.svg" alt="Image" class="img-fluid">
                                </span>
                                <span>Đăng ký thôi bạn ơi</span>
                            </h3>
                            <form action="#" class="row g-3">
                                <div class="col-auto">
                                    <input type="text" class="form-control" placeholder="Điền tên của bạn">
                                </div>
                                <div class="col-auto">
                                    <input type="email" class="form-control" placeholder="Email nữa">
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
                        <div class="mb-4 footer-logo-wrap">
                            <a href="#" class="footer-logo">Zesty<span>.</span></a>
                        </div>
                        <p class="mb-4">Zesty - Người bạn đồng hành tuyệt vời nhất của bạn trong hành trình ngon miệng.</p>
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
                                    <li><a href="#">Nguyên liệu</a></li>
                                    <li><a href="#">Combo</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Liên hệ</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Hỗ trợ</a></li>
                                    <li><a href="#">Kho thông tin</a></li>
                                </ul>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <ul class="list-unstyled">
                                    <li><a href="#">Live chat</a></li>
                                    <li><a href="#">Thông tin</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/tiny-slider.js"></script>
        <script src="../assets/js/custom.js"></script>
    </body>
</html>
