<?php
    print_r($_GET);
    print_r($_POST);
?>

<form action="test.php?id=100" method="post">
姓名:<input type="text" name="name" /><br>
年龄:<input type="text" name="age" /><br>
<input type="submit" value="提交" />
</form>
