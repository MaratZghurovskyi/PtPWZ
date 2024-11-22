<?php
session_start();

$servername = "MySQL-8.0";
$username = "root";
$password = "";
$dbname = "mydb";

//$dir = dirname(__FILE__) . '/dump.sql';
//exec("G:/3kurs/OSPanel/modules/MySQL-8.0/bin/mysqldump --user={$username} --password={$password} --host={$servername} {$dbname} --result-file={$dir} 2>&1", $output);
//var_dump($output); 
//дамп

//підключення до бази даних
$conn = new mysqli($servername, $username, $password, $dbname);

//перевірка підключення
if ($conn->connect_error) {
    die("Помилка підключення: " . $conn->connect_error);
}
//реєстрація
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $email = htmlspecialchars($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //хешування (не мд5, бо воно чомусь не працює з пасворд_веріфай
    //перевірка чи існує користувач
    $sql_check = "SELECT * FROM users WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $stmt_check->store_result();

    if ($stmt_check->num_rows > 0) {
        echo "user already exists";
    } else {
        //новий користувач
        $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $email, $password);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }
        $stmt->close();
    }
    $stmt_check->close();
}




$conn->close();
?>

<!DOCTYPE html>
<html>
<body>
<h2>register</h2>
<form action="register.php" method="post">
    <label>username:</label>
    <input type="text" name="username" required><br><br>
    <label>email:</label>
    <input type="email" name="email" required><br><br>
    <label>password:</label>
    <input type="password" name="password" required><br><br>
    <button type="submit">Register</button>
</form>
</body>
</html>
