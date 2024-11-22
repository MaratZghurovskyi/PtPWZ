<?php
session_start();

$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "mydb";

//підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

//перевірка підключення
if ($conn->connect_error) {
    die("connection error: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];
    //пошук
    $sql = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id, $db_username, $db_password);
        $stmt->fetch();
        if (password_verify($password, $db_password)) {
            //збереження даних в сесії
            $_SESSION['user_id'] = $user_id;
            $_SESSION['username'] = $db_username;
            //перенаправлення на захищену сторінку
            header("Location: welcome.php");
            exit;
        } else {
            echo "invalid password";
        }
    } else {
        echo "invalid username";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<h2>login</h2>
<form action="login.php" method="post">
    <label>username:</label>
    <input type="text" name="username" required><br><br>
    <label>password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Log in</button>
</form>
</body>
</html>
