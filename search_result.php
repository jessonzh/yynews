<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 搜索结果</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/search_result.css">
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
        <div class="title">搜索结果</div>
        <?php
            require_once './class/NewsDAO.class.php';
            $search = $_POST["searchfield"];
            trim($search);
            //trim() 函数从字符串的两端删除空白字符和其他预定义字符。
            //测试是否为空字符
            if(!$search){
                echo "<p>请输入搜索的关键词！</p>";
            } else {
                $search = addslashes($search);
                //防止转义字符
                if ($_POST["newstype"] == 'title') {
                    $news = new NewsDAO();
                    $news->searchNewsByTitle($search);
                } else {
                    $news = new NewsDAO();
                    $news->searchNewsByContent($search);
                }
            }
         ?>
    </div>
<!-- main部分结束 -->

    <?php
    require './inc/footer.inc';
     ?>
</div>
</body>
</html>
