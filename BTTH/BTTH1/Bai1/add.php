<?php
include 'flowers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem tệp ảnh đã được tải lên chưa
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'images/'; // Thư mục lưu ảnh
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // Kiểm tra và di chuyển tệp ảnh vào thư mục
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $newFlower = [
                'name' => $_POST['name'],
                'describe' => $_POST['describe'],
                'image' => $uploadFile // Lưu đường dẫn ảnh
            ];

            $flowers[] = $newFlower;

            // Cập nhật lại file flowers.php
            file_put_contents('flowers.php', "<?php\n\$flowers = " . var_export($flowers, true) . ";\n");

            header('Location: admin_form.php'); // Quay lại trang quản trị
            exit;
        } else {
            echo "Không thể tải ảnh lên. Vui lòng thử lại!";
        }
    } else {
        echo "Vui lòng chọn một tệp ảnh hợp lệ.";
    }
}
?>
