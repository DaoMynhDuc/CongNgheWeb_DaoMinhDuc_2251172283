<?php
include 'products.php';

if (isset($_GET['index'])) {
    $index = $_GET['index'];

    // Xóa sản phẩm khỏi mảng
    unset($products[$index]);

    // Cập nhật lại file
    $content = "<?php\n\$products = " . var_export($products, true) . ";";
    file_put_contents('products.php', $content);
}

// Chuyển hướng về index
header('Location: index.php');
exit();
?>
