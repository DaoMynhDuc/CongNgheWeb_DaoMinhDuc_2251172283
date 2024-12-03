<?php include 'views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Thêm sản phẩm mới</h2>
    <form action="?action=add" method="POST">
        <div class="form-group">
            <label for="name">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="price">Giá sản phẩm:</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
    </form>
</div>

<?php include 'views/layouts/footer.php'; ?>
