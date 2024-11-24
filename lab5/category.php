<?php
class Category {
    public $categoryName;
    private $products = [];

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    //додавання товару
    public function addProduct(Product $product) {
        $this->products[] = $product;
    }

    //виведення товару
    public function getProducts() {
        echo "Категорія: {$this->categoryName}\n";
        foreach ($this->products as $product) {
            echo $product->getInfo() . "\n";
        }
    }
}
?>