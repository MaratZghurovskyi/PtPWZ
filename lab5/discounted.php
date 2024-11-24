<?php
require_once 'product.php';

class DiscountedProduct extends Product {
    public $discount;

    public function __construct($name, $price, $description, $discount) {
        parent::__construct($name, $price, $description);
        $this->discount = $discount;
    }

    //розрахунок знижки
    public function getDiscountedPrice() {
        return $this->price * (1 - $this->discount / 100);
    }

    //виведення ціни зі знижкою
    public function getInfo() {
        $discountedPrice = $this->getDiscountedPrice();
        return "назва: {$this->name}\nціна без знижки: {$this->price}\nзнижка: {$this->discount}%\nціна зі знижкою: {$discountedPrice}\nопис: {$this->description}\n";
    }
}
?>