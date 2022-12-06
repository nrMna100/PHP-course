<?
$rows = [];
array_push(
    $rows,
    [
        "order" => "1",
        "first_name" => "Mark",
        "last_name" => "Otto",
        "username" => "@mdo",
    ],
    [
        "order" => "2",
        "first_name" => "Jacob",
        "last_name" => "Thornton",
        "username" => "@fat",
    ],
    [
        "order" => "3",
        "first_name" => "Larry",
        "last_name" => "the Bird",
        "username" => "@twitter",
    ],
    [
        "order" => "4",
        "first_name" => "Larry the Bird",
        "last_name" => "Bird",
        "username" => "@twitter",
    ],
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>
        Подготовительные задания к курсу
    </title>
    <meta name="description" content="Chartist.html">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
    <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
    <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
    <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
    <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
    <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
    <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
</head>

<body class="mod-bg-1 mod-nav-link ">
    <main id="js-page-content" role="main" class="page-content">
        <div class="col-md-6">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Задание
                    </h2>
                    <div class="panel-toolbar">
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                        <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    </div>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <h5 class="frame-heading">
                            Обычная таблица
                        </h5>
                        <div class="frame-wrap">
                            <table class="table m-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Username</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <? if (isset($rows) && count($rows) > 0) : ?>
                                    <tbody>
                                        <?
                                        foreach ($rows as $row) :
                                            if (count($row) > 0) :
                                        ?>
                                                <tr>
                                                    <th scope="row"><?= $row["order"] ?? ""; ?></th>
                                                    <td><?= $row["first_name"] ?? ""; ?></td>
                                                    <td><?= $row["last_name"] ?? ""; ?></td>
                                                    <td><?= $row["username"] ?? ""; ?></td>
                                                    <td>
                                                        <a href="show.php?id=" class="btn btn-info">Редактировать</a>
                                                        <a href="edit.php?id=" class="btn btn-warning">Изменить</a>
                                                        <a href="delete.php?id=" class="btn btn-danger">Удалить</a>
                                                    </td>
                                                </tr>
                                        <?
                                            endif;
                                        endforeach;
                                        ?>
                                    </tbody>
                                <? endif; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="js/vendors.bundle.js"></script>
    <script src="js/app.bundle.js"></script>
    <script>
        // default list filter
        initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
        // custom response message
        initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
    </script>
</body>

</html>
