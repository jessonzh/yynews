<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 新闻列表</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/news_list.css">
</head>
<body>
<div id="container">
    <?php
    require ('./inc/header.inc');
     ?>

<!-- main部分开始 -->
    <div id="main">
        <div id="categories">
            <div class="title">新闻分类</div>
        </div>
        <div id="newstype">
            <div class="title"><?php echo $_POST[$newstype]; ?></div>

        </div>
    </div>
<!-- main部分结束 -->

    <?php
    require './inc/footer.inc';
     ?>
</div>
</body>
</html>
