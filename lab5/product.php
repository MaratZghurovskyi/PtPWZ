<?php
class Product {
    public $name;
    public $description;
    protected $price;

    public function __construct($name, $price, $description) {
        $this->name = $name;
        $this->setPrice($price);
        $this->description = $description;
    }

    //виведення інформації про товар
    public function getInfo() {
        return "Назва: {$this->name}\nЦіна: {$this->price}\nОпис: {$this->description}\n";
    }

    //встановлення ціни
    public function setPrice($price) {
        if ($price < 0) { //валідація
            throw new Exception("Ціна не може бути від'ємною.");
        }
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }
}
?>