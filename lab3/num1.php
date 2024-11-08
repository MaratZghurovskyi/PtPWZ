<?php
if (isset($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);
    setcookie('username', $name, time() + (7 * 86400)); //7 днів
    $_COOKIE['username'] = $name;
}

if (isset($_POST['delete_cookie'])) {
    setcookie('username', '', time() - 3600); //видалення кукі
    unset($_COOKIE['username']);
}
?>

<!DOCTYPE html>
<html>
<body>

<?php if (isset($_COOKIE['username'])): ?>
    <h1>Hello <?php echo $_COOKIE['username']; ?>!</h1>
    <form method="post">
        <button type="submit" name="delete_cookie">erase cookies</button>
    </form>
<?php else: ?>
    <form method="post">
        <label for="name">write your name:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Submit</button>
    </form>
<?php endif; ?>

</body>
</html>
