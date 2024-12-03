<?php
// Tự động tải các class cần thiết
spl_autoload_register(function ($class) {
    $path = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($path)) {
        require_once $path;
    }
});

// Định nghĩa namespace cho Controller
use controllers\ProductController;

// Lấy action từ URL, mặc định là `index`
$action = $_GET['action'] ?? 'index';

// Khởi tạo Controller chính
$controller = new ProductController();

// Kiểm tra action có tồn tại trong Controller hay không
if (method_exists($controller, $action)) {
    $controller->$action(); // Gọi action
} else {
    echo "Action không tồn tại!";
}
