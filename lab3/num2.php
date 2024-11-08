<?php
session_start(); //сесія

$prelogin = 'labthree';
$prepassword = 'laboratorna';

//перевірка чи залогінений користувач
if (isset($_POST['login']) && isset($_POST['password'])) {
    $login = $_POST['login'];
    $password = $_POST['password'];
    
    if ($login === $prelogin && $password === $prepassword) {
        $_SESSION['user'] = $login;
    } else {
        $error = "wrong password and/or login";
    }
}

if (isset($_POST['logout'])) {
    session_unset(); 
    session_destroy(); 
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>

<?php if (isset($_SESSION['user'])): ?>
    <h1>hello <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <form method="post">
        <button type="submit" name="logout">log off</button>
    </form>
<?php else: ?>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="login">login:</label>
        <input type="text" id="login" name="login" required>
        <br>
        <label for="password">password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Submit</button>
    </form>
<?php endif; ?>

</body>
</html>