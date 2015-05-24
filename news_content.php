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
     ?>

<!-- main部分开始 -->
    <div id="main">
        <div id="newscontent">
            <div class="title">新闻标题：实际的新闻标题</div>
            输出实际的新闻内容
        </div>
        <div id="comments">
            <div class="title">新闻评论</div>
            <div id="addcomments">
                <form action="class/" method="post">
                    <p>添加评论</p>
                    <textarea name="Comment" rows="10" cols="50"></textarea>
                    <p><input type="submit" value="提交"></p>
                </form>
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
