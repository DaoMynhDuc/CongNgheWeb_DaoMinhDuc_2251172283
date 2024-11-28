<?php
include 'header.php';
include 'products.php';
?>
<div class="container mt-4">
    <a href="add_product.php" class="btn btn-success mb-3">Thêm sản phẩm</a>
    <?php if (empty($products)): ?>
        <p>Không có sản phẩm nào.</p>
    <?php else: ?>
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Giá thành</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $index => $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?> VND</td>
                        <td>
                            <a href="update_product.php?index=<?= $index ?>" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a href="delete.php?index=<?= $index ?>" class="btn btn-danger btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    <?php endif; ?>
</div>
<hr class = "mt-5">
<?php include 'footer.php'; ?>
