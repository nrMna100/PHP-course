<?
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
    $sql = "INSERT INTO texts (text) VALUES (:textTag)";
    $STH = $DBH->prepare($sql);
    $STH->bindParam(':textTag', $textVal);
    $STH->execute();

    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (PDOException $error) {
    echo $error->getMessage();
};
