<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 首页</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/index.css">
</head>
<body>
<div id="container">
    <?php
    require ('./inc/header.inc');
    require_once './class/Db.conf.php';
    require_once './class/DbConnect.class.php';
     ?>

<!-- main部分开始 -->
    <div id="main">
        <div id="categories">
            <div class="title">新闻分类</div>
            <ul>
                <li><a href="./index.php">首&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp页</a></li>
                <?php
                    require_once './class/CategoryDAO.class.php';
                    $ca = new CategoryDAO();
                    $ca->displayCategories($ca->getCategories());
                 ?>
            </ul>
        </div>
        <div id="newten">
            <div class="title">最新十条</div>
            <?php
                require_once './class/NewsDAO.class.php';
                $news = new NewsDAO();
                $news->displayNewTenNews();
             ?>
        </div>
        <div id="hotten">
            <div class="title">最热十条</div>
            <?php
                require_once './class/NewsDAO.class.php';
                $news = new NewsDAO();
                $news->displayHotTenNews();
             ?>
        </div>
    </div>
<!-- main部分结束 -->

    <?php
    require './inc/footer.inc';
     ?>
</div>
</body>
</html>
