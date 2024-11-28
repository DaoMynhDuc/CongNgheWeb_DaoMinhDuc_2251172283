<?php
include 'flowers.php';

// Lấy chỉ mục bài viết từ URL
$id = $_GET['id'] ?? null;

if ($id !== null && isset($flowers[$id])) {
    // Xóa ảnh trong thư mục nếu tồn tại
    $imagePath = $flowers[$id]['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath); // Xóa ảnh
    }

    // Xóa bài viết khỏi mảng
    unset($flowers[$id]);

    // Cập nhật lại file flowers.php
    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export(array_values($flowers), true) . ";\n");

    header('Location: admin_form.php'); // Quay lại trang quản trị
    exit;
} else {
    echo "Bài viết không tồn tại.";
}
?>
