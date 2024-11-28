<?php
include 'header.php';
include 'products.php';

$productIndex = $_GET['index'];
$product = $products[$productIndex];
?>
<div class="container mt-5">
    <h2>Sửa sản phẩm</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="index" value="<?= $productIndex ?>">
        <div class="mb-3">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" id="product_name" name="product_name" class="form-control" value="<?= htmlspecialchars($product['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="product_price">Giá thành</label>
            <input type="number" id="product_price" name="product_price" class="form-control" value="<?= htmlspecialchars($product['price']) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
<?php include 'footer.php'; ?>
