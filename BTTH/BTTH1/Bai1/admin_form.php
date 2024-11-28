<?php
include 'header.php';
include 'flowers.php';
?>
<div class="container mt-4">
    <a href="add_form.php" class="btn btn-success mb-3">Thêm bài viết</a>
    <?php if (empty($flowers)): ?>
        <p>Không có bài viết nào.</p>
    <?php else: ?>
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                    <th>Tên hoa</th>
                    <th>Mô tả</th>
                    <th>Hình ảnh</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($flowers as $index => $flower): ?>
                    <tr>
                        <td><?= htmlspecialchars($flower['name']) ?></td>
                        <td><?= htmlspecialchars($flower['describe']) ?></td>
                        <td>
                            <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" class="flower-image" width="100">
                        </td>
                        <td>
                            <a href="edit_form.php?id=<?= $index ?>" class="btn btn-warning btn-sm">Sửa</a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= $index ?>" class="btn btn-danger btn-sm" 
                            onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này?');">
                            Xóa
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>
<hr class="mt-5">
<?php include 'footer.php'; ?>
