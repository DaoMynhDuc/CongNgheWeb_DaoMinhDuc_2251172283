<?php
namespace controllers;

use models\ProductModel;

class ProductController {
    private $model;

    public function __construct() {
        $this->model = new ProductModel();
    }

    public function index() {
        // Lấy dữ liệu sản phẩm từ Model
        $products = $this->model->getAllProducts();
        // Hiển thị view index và truyền dữ liệu sản phẩm
        include 'views/index.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form
            $name = $_POST['name'];
            $price = $_POST['price'];
            // Thêm sản phẩm vào database
            $this->model->addProduct($name, $price);
            header('Location: index.php');
        }
        // Hiển thị view add
        include 'views/products/add.php';
    }

    public function edit() {
        $id = $_GET['id'];
        $product = $this->model->getProductById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $this->model->updateProduct($id, $name, $price);
            header('Location: index.php');
        }
        // Hiển thị view edit
        include 'views/products/edit.php';
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->deleteProduct($id);
        header('Location: index.php');
    }
}
