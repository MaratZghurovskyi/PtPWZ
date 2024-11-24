<?php
require_once 'AccountInterface.php';
class BankAccount implements AccountInterface {
    const MIN_BALANCE = 0;
    protected $balance;
    protected $currency;

    public function __construct($currency, $initialBalance = 0) {
        $this->currency = $currency;
        $this->balance = max($initialBalance, self::MIN_BALANCE); 
    }

    //поповнення
    public function deposit($amount) {
        if ($amount < 0) {
            throw new Exception("сума поповнення не може бути від'ємною");
        }
        $this->balance += $amount;
    }

    //зняття
    public function withdraw($amount) {
        if ($amount < 0) {
            throw new Exception("сума зняття не може бути від'ємною");
        }
        if ($amount > $this->balance) {
            throw new Exception("недостатньо коштів");
        }
        $this->balance -= $amount;
    }

    public function getBalance() {
        return $this->balance . ' ' . $this->currency;
    }
}
?>