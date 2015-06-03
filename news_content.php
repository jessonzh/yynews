<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 新闻内容</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/news_content.css">
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
        <div id="newscontent">
            <?php
                require_once './class/NewsDAO.class.php';
                $news = new NewsDAO();
                $news->displayNewsByNewsid($_GET["newsId"]);
             ?>
        </div>
        <div id="comments">
            <div class="title">新闻评论</div>
            <?php
                require_once './class/CommentDAO.class.php';
                $comment = new CommentDAO();
                $comment->displayComments($_GET["newsId"]);
             ?>
            <div id="addcomments">
                <?php
                    if (!isset($_POST['content'])) {
                 ?>
                <form action="./news_content.php?newsId=<?php echo $_GET["newsId"]; ?>" method="post">
                    <p>添加评论</p>
                    <textarea name="content" rows="5" cols="100"></textarea>
                    <p><input id="sub" type="submit" value="提交"></p>
                </form>
                <?php
                    } elseif(isset($_POST['content'])) {
                        echo "谢谢评论！";
                        require_once './class/CommentDAO.class.php';
                        $comm = new CommentDAO();
                        $time = date("Ymd");
                        $comm->insertComment($_POST['content'], $time, $_SERVER["REMOTE_ADDR"], $_GET["newsId"]);
                    }
                 ?>
            </div>
        </div>
    </div>
<!-- main部分结束 -->

    <?php
    require './inc/footer.inc';
     ?>
</div>
</body>
</html>
