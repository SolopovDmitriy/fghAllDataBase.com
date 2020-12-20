<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Restaurant</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
    <link rel="shortcut icon" href="/static/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/static/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/css/animations.css">
    <link rel="stylesheet" href="/static/css/main.css">
    <script src="/static/js/vendor/modernizr-2.6.2.min.js"></script>
    <!--[if lt IE 9]>
    <script src="/static/js/vendor/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->

<div class="info">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-xs-6">
                <div class="work-time"><span>E-mail:</span>
                    info@company.com
                </div>
            </div>
            <div class="col-sm-6 col-xs-6">
                <div class="phone"><span>Call us:</span>
                    (800) 2345-6789
                </div>
            </div>

        </div>
    </div>
</div>

<header id="header" class="color_section">
    <div class="container">
        <div class="row">
            <a class="navbar-brand" href="#top"><img src="/static/example/logo.png" alt=""></a>
            <div class="col-sm-12 mainmenu_wrap">
                <div class="main-menu-icon visible-xs">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav>
                    <ul id="mainmenu" class="menu sf-menu responsive-menu superfish">
                        <?php
                        $nav = $data['navigate'];
                        for ($i = 0; $i < count($nav); $i++) {
                            $parent = $nav[$i]['parent'];
                            $childs = $nav[$i]['childs'];
                            if ($childs == null) { ?>
                                <li class="active">
                                    <a href="<?= $parent["href"] ?>"><?= $parent["title"] ?></a>
                                </li>
                            <?php } else { ?>
                                <li class="dropdown">
                                    <a href="<?= $parent["href"] ?>"><?= $parent["title"] ?></a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($childs as $key => $child) { ?>
                                            <li class="active">
                                                <a href="<?= $child["href"] ?>"><?= $child["title"] ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <?
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
