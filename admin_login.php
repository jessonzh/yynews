<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>云影新闻网 | 后台管理中心</title>
    <link rel="stylesheet" type="text/css" href="./css/reset.css">
    <link rel="stylesheet" type="text/css" href="./css/header.css">
    <link rel="stylesheet" type="text/css" href="./css/footer.css">
    <link rel="stylesheet" type="text/css" href="./css/admin_login.css">
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
        <div class="title">管理员登录</div>
        <?php
            if (!isset($_POST["username"]) and !isset($_POST["password"])) {
         ?>
        <form action="./admin_login.php" method="post">
            <table>
                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password"></td>
                </tr>
            </table>
            <p><a href="#">忘记密码</a></p>
            <p><input type="submit" value="登录"></p>
        </form>
        <?php
            } elseif (isset($_POST["username"]) and isset($_POST["password"])) {
                $username = $_POST["username"];
                $password = $_POST["password"];
                trim($username);
                trim($password);
                if ((!$username) or (!$password)){
                    echo "登录失败！请输入帐号和密码";
                } else {
                    require_once './class/UserDAO.class.php';
                    $user = new UserDAO();
                    if ($user->passwordIsRight($username, $password)) {
                        echo "<script type=\"text/javascript\">location.href=\"./news_manage.php\";</script>";
                    } else {
                        echo "帐号或密码错误！请重新输入！";
                    }
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
