<?
session_start();

$emailVal = $_POST["email"];
$realPasswordVal = $_POST["password"];

$driver = 'mysql';
$host = 'localhost';
$db_name = 'task_15';
$db_user = 'root';
$db_password = '';
$charset = 'utf8';

$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
try {
    $DBH = new PDO($dsn, $db_user, $db_password);
    $sql = "SELECT email FROM users WHERE email=:emailTag";
    $STH = $DBH->prepare($sql);
    $STH->bindParam(':emailTag', $emailVal);
    $STH->execute();
    $existing_email = $STH->fetch(PDO::FETCH_ASSOC);

    if (!empty($existing_email)) {
        $sql = "SELECT password FROM users WHERE email=:emailTag";
        $STH = $DBH->prepare($sql);
        $STH->bindParam(':emailTag', $emailVal);
        $STH->execute();
        $user_data = $STH->fetch(PDO::FETCH_ASSOC);

        if (password_verify($realPasswordVal, $user_data["password"])) {
            $_SESSION["user_data"] = ["email" => $emailVal, "password" => $user_data["password"]];
        } else {
            $_SESSION["error"] = "Неверный логин или пароль";
        }
    } else {
        $_SESSION["error"] = "Неверный логин или пароль";
    }

    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (PDOException $error) {
    echo $error->getMessage();
};
