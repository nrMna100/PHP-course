<?
$users = [];
array_push(
    $users,
    [
        "user_avatar" => "img/demo/authors/sunny.png",
        "user_name" => "Sunny A.",
        "user_position" => "(UI/UX Expert)",
        "user_role" => "Lead Author",
        "user_twitter_login" => "@myplaneticket",
        "user_twitter_link" => "https://twitter.com/@myplaneticket",
        "wrapbootstrap_user_link" => "https://wrapbootstrap.com/user/myorange",
    ],
    [
        "user_avatar" => "img/demo/authors/josh.png",
        "user_name" => "Jos K.",
        "user_position" => "(ASP.NET Developer)",
        "user_role" => "Partner &amp; Contributor",
        "user_twitter_login" => "@atlantez",
        "user_twitter_link" => "https://twitter.com/@atlantez",
        "wrapbootstrap_user_link" => "https://wrapbootstrap.com/user/Walapa",
    ],
    [
        "user_avatar" => "img/demo/authors/jovanni.png",
        "user_name" => "Jovanni L.",
        "user_position" => "(PHP Developer)",
        "user_role" => "Partner &amp; Contributor",
        "user_twitter_login" => "@lodev09",
        "user_twitter_link" => "https://twitter.com/@lodev09",
        "wrapbootstrap_user_link" => "https://wrapbootstrap.com/user/lodev09",
    ],
    [
        "user_avatar" => "img/demo/authors/roberto.png",
        "user_name" => "Roberto R.",
        "user_position" => "(Rails Developer)",
        "user_role" => "Partner &amp; Contributor",
        "user_twitter_login" => "@sildur",
        "user_twitter_link" => "https://twitter.com/@sildur",
        "wrapbootstrap_user_link" => "https://wrapbootstrap.com/user/sildur",
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
                        <? if (isset($users) && count($users) > 0) :  ?>
                            <div class="d-flex flex-wrap demo demo-h-spacing mt-3 mb-3">
                                <?
                                foreach ($users as $user) :
                                    if (count($user) > 0) :
                                ?>
                                        <div class="rounded-pill bg-white shadow-sm p-2 border-faded mr-3 d-flex flex-row align-items-center justify-content-center flex-shrink-0">
                                            <img src="<?= $user["user_avatar"] ?? ""; ?>" alt="<?= $user["user_name"] ?? ""; ?>" class="img-thumbnail img-responsive rounded-circle" style="width:5rem; height: 5rem;">
                                            <div class="ml-2 mr-3">
                                                <h5 class="m-0">
                                                    <?= ($user["user_name"] ?? "") . " " . ($user["user_position"] ?? ""); ?>
                                                    <small class="m-0 fw-300">
                                                        <?= $user["user_role"] ?? ""; ?>
                                                    </small>
                                                </h5>
                                                <a href="<?= $user["user_twitter_link"] ?? ""; ?>" class="text-info fs-sm" target="_blank"><?= $user["user_twitter_login"] ?? ""; ?></a> -
                                                <a href="<?= $user["wrapbootstrap_user_link"] ?? ""; ?>" class="text-info fs-sm" target="_blank" title="Contact <?= $user["user_name"] ?? ""; ?>"><i class="fal fa-envelope"></i></a>
                                            </div>
                                        </div>
                                <?
                                    endif;
                                endforeach;
                                ?>
                            </div>
                        <? endif; ?>
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
