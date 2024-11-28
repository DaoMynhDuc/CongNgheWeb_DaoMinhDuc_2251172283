<?php
include 'flowers.php';

// Lấy chỉ mục bài viết từ URL
$id = $_GET['id'] ?? null;

if ($id === null || !isset($flowers[$id])) {
    header('Location: admin_form.php'); // Quay lại nếu không tìm thấy bài viết
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $updatedFlower = [
        'name' => $_POST['name'],
        'describe' => $_POST['describe'],
        'image' => $_POST['current_image'] // Giữ ảnh cũ nếu không có ảnh mới
    ];

    // Kiểm tra xem có tải ảnh mới hay không
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $updatedFlower['image'] = $uploadFile;
        } else {
            echo "Không thể tải ảnh mới. Sử dụng ảnh cũ.";
        }
    }

    $flowers[$id] = $updatedFlower;

    // Lưu lại dữ liệu vào file flowers.php
    file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n");

    header('Location: admin_form.php'); // Quay lại trang quản trị
    exit;
}
?>
