<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<body>
<h1>welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<a href="logout.php">logout</a>
</body>
</html>
