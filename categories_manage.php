<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 新闻类别管理</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/categories_manage.css">
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
        <div id="managecenter">
            <div class="title">管理中心</div>
            <ul>
                <li><a href="./index.php">首&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp页</a></li>
                <li><a href="./categories_manage.php">类别管理</a></li>
                <li><a href="./news_manage.php">新闻管理</a></li>
                <li><a href="./comments_manage.php">评论管理</a></li>
            </ul>
        </div>
        <div id="categoriesmanage">
            <div class="title">类别管理</div>
            <?php
                require_once './class/CategoryDAO.class.php';
                $ca = new CategoryDAO();
                if (isset($_GET["catId"])) {
                    $ca->deleteRow($_GET["catId"]);
                }
                if (isset($_POST["category"])) {
                    $ca->insertCategories($_POST["category"]);
                }
                $ca->manageCategories($ca->getCategories());
             ?>
            <form action="./categories_manage.php" method="post">
                <p id="insert">请输入类别名称：
                <input type="text" name="category">
                <input type="submit" value="增加类别"></p>
            </form>
        </div>
    </div>
<!-- main部分结束 -->

    <?php
    require './inc/footer.inc';
     ?>
</div>
</body>
</html>
