<?
session_start();

$emailVal = $_POST["email"];
$passwordVal = $_POST["password"];

$driver = 'mysql';
$host = 'localhost';
$db_name = 'task_12';
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
    $duplicate = $STH->fetch(PDO::FETCH_ASSOC);

    if (!empty($duplicate)) {
        $_SESSION["show_message"] = true;
    } else {
        $_SESSION["show_message"] = false;

        $sql = "INSERT INTO users (email, password) VALUES (:emailTag, :passwordTag)";
        $STH = $DBH->prepare($sql);
        $STH->bindParam(':emailTag', $emailVal);
        $STH->bindParam(':passwordTag', $passwordVal);
        $STH->execute();
    }

    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (PDOException $error) {
    echo $error->getMessage();
};
