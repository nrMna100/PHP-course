<?
function is_file_empty($file)
{
    return empty($file['name'][0]);
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

function return_only_images($file)
{
    $sorted_files = array();
    foreach ($file as $k => $l) {
        foreach ($l as $i => $v) {
            $sorted_files[$i][$k] = $v;
        }
    }

    $images = array();

    foreach ($sorted_files as $file) {
        if (is_image($file))
            $images[] = $file;
    }

    return $images;
}

$images = return_only_images($_FILES['file']);

if (count($images) === 0) {
    if (!empty($_SERVER['HTTP_REFERER']))
        header("Location: " . $_SERVER['HTTP_REFERER']);
    die;
}

function set_unique_image_name($image)
{
    list($width, $height) = getimagesize($image['tmp_name']);
    return uniqid() . "-size-{$width}-{$height}-{$image['name']}";
}

function upload_images($images)
{
    $filed_directory = 'uploads/';
    $unique_image_names = array();

    foreach ($images as $image) {
        $unique_image_name = set_unique_image_name($image);
        move_uploaded_file($image['tmp_name'], $filed_directory . $unique_image_name);
        $unique_image_names[] = $unique_image_name;
    }

    $driver = 'mysql';
    $host = 'localhost';
    $db_name = 'task_17';
    $db_user = 'root';
    $db_password = '';
    $charset = 'utf8';

    $images_names_for_sql_request = implode("'), ('", $unique_image_names);

    $dsn = "$driver:host=$host;dbname=$db_name;charset=$charset";
    try {
        $DBH = new PDO($dsn, $db_user, $db_password);
        $sql = "INSERT INTO file_names (filename) VALUES ('" . $images_names_for_sql_request . "')";
        $DBH->query($sql);

        if (!empty($_SERVER['HTTP_REFERER']))
            header("Location: " . $_SERVER['HTTP_REFERER']);
    } catch (PDOException $error) {
        echo $error->getMessage();
    };
}

upload_images($images);
