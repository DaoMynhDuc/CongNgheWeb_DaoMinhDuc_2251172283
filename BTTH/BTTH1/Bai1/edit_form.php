<?php
include 'flowers.php';

// Lấy chỉ mục bài viết từ URL
$id = $_GET['id'] ?? null;

if ($id === null || !isset($flowers[$id])) {
    header('Location: admin_form.php'); // Quay lại nếu không tìm thấy bài viết
    exit;
}

$flower = $flowers[$id];
?>

<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Sửa Bài Viết</h2>
    <form action="edit.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" class="form-control" id="name" name="name" value="<?= htmlspecialchars($flower['name']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="describe" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="describe" name="describe" rows="4" required><?= htmlspecialchars($flower['describe']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="current_image" class="form-label">Hình Ảnh Hiện Tại</label><br>
            <img src="<?= htmlspecialchars($flower['image']) ?>" alt="<?= htmlspecialchars($flower['name']) ?>" class="mb-3" width="200">
            <input type="hidden" name="current_image" value="<?= htmlspecialchars($flower['image']) ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Tải Ảnh Mới (nếu muốn thay đổi)</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="admin_form.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php include 'footer.php'; ?>
