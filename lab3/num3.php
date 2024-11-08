<?php
// Перевірка методу запиту
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: num2.php"); //перенаправлення
    exit;
}

$client_ip = $_SERVER['REMOTE_ADDR'];
$user_agent = $_SERVER['HTTP_USER_AGENT']; 
$script_name = $_SERVER['PHP_SELF'];
$request_method = $_SERVER['REQUEST_METHOD']; 
$file_path = $_SERVER['SCRIPT_FILENAME'];
?>

<!DOCTYPE html>
<html>
<body>
    <p>IP: <?php echo htmlspecialchars($client_ip); ?></p>
    <p>browser: <?php echo htmlspecialchars($user_agent); ?></p>
    <p>script name: <?php echo htmlspecialchars($script_name); ?></p>
    <p>method: <?php echo htmlspecialchars($request_method); ?></p>
    <p>path: <?php echo htmlspecialchars($file_path); ?></p>
</body>
</html>