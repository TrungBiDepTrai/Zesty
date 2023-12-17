<!-- search.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('../components/connection.php');
    include_once('../components/assets.php');
    include_once('../components/header_user.php');
    ?>
    <title>Kết quả tìm kiếm</title>
</head>

<body>
    <div class="container">
        <h2>Kết quả tìm kiếm</h2>

        <?php
        if (isset($_GET['query'])) {
            $search_query = $_GET['query'];
            $sql = "SELECT * FROM sanpham WHERE TenSanPham LIKE '%$search_query%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
        ?>
                    <div class="product-item">
                        <img src="../images/Product/<?php echo $row["Anh"] ?>" class="img-fluid product-thumbnail">
                        <h3 class="product-title"><?php echo $row["TenSanPham"] ?></h3>
                        <strong class="product-price"><?php echo number_format($row["Gia"]) ?>VNĐ</strong>
                        <a href="add_to_cart.php?product_id=<?php echo $row["MaSanPham"]; ?>" class="btn btn-primary">Thêm vào giỏ hàng</a>
                    </div>
        <?php
                }
            } else {
                echo "<p>Không tìm thấy sản phẩm nào.</p>";
            }
        } else {
            echo "<p>Không có từ khóa tìm kiếm.</p>";
        }
        ?>
    </div>
</body>

</html>
