<?php
session_start();

// 5 хвилин
$timeout_duration = 300;

if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $timeout_duration) {
    session_unset();
    session_destroy(); 
    header("Location: num4.php"); 
    exit;
}

$_SESSION['last_activity'] = time();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

//перевірка кукі
$previous_purchases = isset($_COOKIE['previous_purchases']) ? json_decode($_COOKIE['previous_purchases'], true) : [];

//додавання товару
if (isset($_POST['add_to_cart'])) {
    $item = htmlspecialchars($_POST['item']);
    $_SESSION['cart'][] = $item;
    
    $previous_purchases[] = $item;
    setcookie('previous_purchases', json_encode($previous_purchases), time() + (30 * 86400)); //30 днів
}

//очищення корзини
if (isset($_POST['clear_cart'])) {
    $_SESSION['cart'] = [];
}

//очищення покупок
if (isset($_POST['clear_previous_purchases'])) {
    setcookie('previous_purchases', '', time() - 3600); //очищення кукі
    $previous_purchases = [];
}
?>

<!DOCTYPE html>
<html>
<body>

<form method="post"> 
    <label for="item">add item:</label>
    <input type="text" id="item" name="item" required>
    <button type="submit" name="add_to_cart">Add</button>
</form>

<h3>items in cart:</h3>
<ul>
    <?php if (!empty($_SESSION['cart'])): ?>
        <?php foreach ($_SESSION['cart'] as $cart_item): ?>
            <li><?php echo htmlspecialchars($cart_item); ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>cart is empty</p>
    <?php endif; ?>
</ul>

<form method="post">
    <button type="submit" name="clear_cart">clear cart</button>
</form>

<h3>previous items:</h3>
<ul>
    <?php if (!empty($previous_purchases)): ?>
        <?php foreach ($previous_purchases as $prev_item): ?>
            <li><?php echo htmlspecialchars($prev_item); ?></li>
        <?php endforeach; ?>
    <?php else: ?>
        <p>no items</p>
    <?php endif; ?>
</ul>

<form method="post">
    <button type="submit" name="clear_previous_purchases">clear previous items</button>
