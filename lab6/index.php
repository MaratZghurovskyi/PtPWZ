<?php
require_once 'BankAccount.php';
require_once 'SavingsAccount.php';
try {
    //створення акаунтів
    $account1 = new BankAccount("USD", 100);
    $savingsAccount = new SavingsAccount("USD", 2000);
    //поповнення
    $account1->deposit(100);
    echo "баланс після поповнення: " . $account1->getBalance() . "\n";
    //зняття
    $account1->withdraw(300);
    echo "баланс після зняття: " . $account1->getBalance() . "\n";

    //тест відсоткової ставки
    $savingsAccount->deposit(1000);
    $savingsAccount->applyInterest();
    echo "баланс накопичувального рахунку з відсотками: " . $savingsAccount->getBalance() . "\n";

    //тест нестачі коштів
    $account1->withdraw(9999);
} catch (Exception $e) {
    echo "помилка: " . $e->getMessage() . "\n";
}

try {
    //тест некоректного поповнення
    $account1->deposit(-1);
} catch (Exception $e) {
    echo "помилка: " . $e->getMessage() . "\n";
}
?>