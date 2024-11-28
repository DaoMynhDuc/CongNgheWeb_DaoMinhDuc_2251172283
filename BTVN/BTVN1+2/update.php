<?php
include 'products.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];
    $productIndex = $_POST['index'];

    // Cập nhật sản phẩm
    $products[$productIndex] = ['name' => $productName, 'price' => $productPrice];

    // Ghi lại mảng vào file
    $content = "<?php\n\$products = " . var_export($products, true) . ";";
    file_put_contents('products.php', $content);

    // Chuyển hướng về index
    header('Location: index.php');
    exit();
}
?>
