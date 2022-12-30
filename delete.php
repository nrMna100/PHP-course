<?
$filename = $_GET["filename"];

if (file_exists("uploads/" . $filename))
    unlink("uploads/" . $filename);

$driver = 'mysql';
$host = 'localhost';
$db_name = 'task_17';
$db_user = 'root';
$db_password = '';
$charset = 'utf8';

$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
try {
    $DBH = new PDO($dsn, $db_user, $db_password);
    $sql = "DELETE FROM file_names WHERE filename = :filenameTag";
    $STH = $DBH->prepare($sql);
    $STH->bindParam(':filenameTag', $filename);
    $STH->execute();

    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (PDOException $error) {
    echo $error->getMessage();
};
