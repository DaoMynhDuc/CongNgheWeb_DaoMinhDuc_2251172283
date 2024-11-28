<?php include 'header.php'; ?>
<div class="container mt-4">
    <h2>Thêm Bài Viết Mới</h2>
    <form action="add.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="name" class="form-label">Tên Hoa</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="describe" class="form-label">Mô Tả</label>
            <textarea class="form-control" id="describe" name="describe" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Thêm</button>
        <a href="admin_form.php" class="btn btn-secondary">Quay lại</a>
    </form>
</div>
<?php include 'footer.php'; ?>
