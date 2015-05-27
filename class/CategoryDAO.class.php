<?php
//功能：操作新闻的类别

require_once './DbConnect.class.php';

private $conn;

//构造函数，创建数据库连接
public _construct(){
    $db = new DbConnect();
    $db->db_connect();
    $this->conn = $db->conn;
}

//取出所有的分类，返回一个二维数组
public function getCategories()
{
    $rs = @mysql_query("select * from categories", $this->conn);
    if (!$rs) {
        return false;
    }
    $catNum = @mysql_num_rows($rs);
    if ($catNum == 0) {
        return false;
    }
    $rs_array = array();
    while ($row = mysql_fetch_assoc($rs)) {
        $rs_array[] = $row;
    }
    return $rs_array;
    mysql_close($this->conn);
}

//用li的a形式链接显示全部类别
public function displayCategories($rs_array)
{
    if (!$rs_array) {
        echo "error!";
        return;
    }
    echo "<ul>";
    foreach ($rs_array as $row) {
        $id = $row["catId"];
        $name = $row["catName"];
        echo "<li><a href=\"#\">$name</a></li>";
    }
    echo "</ul>";/
    mysql_close($this->conn);
}

//类别以下拉列表的形式输出
public function optionCategories($rs_array)
{
    if (!rs_array) {
        echo "error!";
        return;
    }
    echo "<select name=\"catName\">";
    foreach ($rs_array as $row) {
        $id = $row["catId"];
        $name = $row["catName"];
        echo "<option value=\"$id\">$name</option>";
        echo "</select>";
    }

}


 ?>




