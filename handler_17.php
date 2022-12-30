<?
if (empty($_FILES['file']['name'])) {
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    die;
}

$allowed_extensions = array("jpg", "jpeg", "gif", "png");
$file_extension = explode('.', strtolower($_FILES['file']['name']));

if (!in_array(end($file_extension), $allowed_extensions)) {
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    die;
}

list($width, $height) = getimagesize($_FILES['file']['tmp_name']);
$unique_file_name = uniqid() . "-size-{$width}-{$height}-{$_FILES['file']['name']}";

$filed_directory = 'uploads/';
move_uploaded_file($_FILES['file']['tmp_name'], $filed_directory . $unique_file_name);

$driver = 'mysql';
$host = 'localhost';
$db_name = 'task_17';
$db_user = 'root';
$db_password = '';
$charset = 'utf8';

$dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
try {
    $DBH = new PDO($dsn, $db_user, $db_password);
    $sql = "INSERT INTO file_names (filename) VALUES ('$unique_file_name')";
    $DBH->query($sql);

    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
} catch (PDOException $error) {
    echo $error->getMessage();
};
