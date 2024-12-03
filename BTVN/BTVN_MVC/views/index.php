<?php include 'views/layouts/header.php'; ?>

<div class="container mt-4">
    <h2>Danh sách sản phẩm</h2>
    <a href="?action=add" class="btn btn-success mb-3">Thêm mới</a>

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
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name']) ?></td>
                        <td><?= htmlspecialchars($product['price']) ?> VND</td>
                        <td><a href="?action=edit&id=<?= $product['id'] ?>" class="btn btn-sm btn-warning">Sửa</a></td>
                        <td><a href="?action=delete&id=<?= $product['id'] ?>" class="btn btn-sm btn-danger">Xóa</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>

<?php include 'views/layouts/footer.php'; ?>
