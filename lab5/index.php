<?php
require_once 'product.php';
require_once 'discounted.php';
require_once 'category.php';

try {
    //створення товарів
    $product1 = new Product("протигаз гп-5", 406, "йде з сумкою та фільтром у комплекті");
    $product2 = new Product("лом-цвяходер", 309, "900 мм, червоний");
    $discountedProduct = new DiscountedProduct("чіпси", 40, "зі смаком бекону", 10);
    //створення категорії
    $home = new Category("товари для дому");
    //додавання товарів до категорії
    $home->addProduct($product1);
    $home->addProduct($product2);
    
    //виведення товарів в категорії
    $home->getProducts();
} catch (Exception $e) {
    echo "error: " . $e->getMessage();
}
?>