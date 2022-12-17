<?
session_start();

$textVal = $_POST["text"];

$driver = 'mysql';
$host = 'localhost';
$db_name = 'task_10';
$db_user = 'root';
$db_password = '';
$charset = 'utf8';

$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";

try {
    $DBH = new PDO($dsn, $db_user, $db_password);
    $sql = "SELECT text FROM texts WHERE text=:textTag";
    $STH = $DBH->prepare($sql);
    $STH->bindParam(':textTag', $textVal);
    $STH->execute();
    $duplicate = $STH->fetch(PDO::FETCH_ASSOC);

    if (!empty($duplicate)) {
        $_SESSION["show_message"] = true;
    } else {
        $_SESSION["show_message"] = false;

        $sql = "INSERT INTO texts (text) VALUES (:textTag)";
        $STH = $DBH->prepare($sql);
        $STH->bindParam(':textTag', $textVal);
        $STH->execute();
    }

    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (PDOException $error) {
    echo $error->getMessage();
};
