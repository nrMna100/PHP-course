<?
function is_file_empty($file)
{
    return empty($file['name']);
}

if (is_file_empty($_FILES['file'])) {
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    die;
}

function is_image($file)
{
    $allowed_extensions = array("jpg", "jpeg", "gif", "png");
    $file_extension = pathinfo($file['name'])["extension"];
    return in_array($file_extension, $allowed_extensions);
}

if (!is_image($_FILES['file'])) {
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    die;
}

function get_unique_image_name($file)
{
    list($width, $height) = getimagesize($file['tmp_name']);
    return  uniqid() . "-size-{$width}-{$height}-{$file['name']}";
}

$unique_file_name = get_unique_image_name($_FILES['file']);

function upload_image_to_dir($file, $filename)
{
    $filed_directory = 'uploads/';
    move_uploaded_file($file['tmp_name'], $filed_directory . $filename);
}

upload_image_to_dir($_FILES['file'], $unique_file_name);

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
