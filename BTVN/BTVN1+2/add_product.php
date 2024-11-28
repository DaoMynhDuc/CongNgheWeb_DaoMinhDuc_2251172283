<?php
include 'header.php';
?>
<div class="container mt-5">
    <h2>Thêm sản phẩm</h2>
    <form action="add.php" method="POST">
        <div class="mb-3">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" id="product_name" name="product_name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="product_price">Giá thành</label>
            <input type="number" id="product_price" name="product_price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Thêm</button>
    </form>
</div>
<?php include 'footer.php'; ?>
