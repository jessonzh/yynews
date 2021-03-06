<?php
/**
 * 功能：操作新闻的类别
 */

// require_once './DbConnect.class.php';

class CategoryDAO
{
    private $conn;

    //构造函数，创建数据库连接
    public function __construct(){
        $db = new DbConnect();
        $db->db_connect();
        $this->conn = $db->conn;
    }

    /**
     * 取出所有的分类，返回一个二维数组
     * @return [type] [description]
     */
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
        while ($row = @mysql_fetch_assoc($rs)) {
            $rs_array[] = $row;
        }
        return $rs_array;
        @mysql_close($this->conn);
    }

    /**
     * 用li的a形式链接显示全部类别
     * @param  [type] $rs_array [description]
     * @return [type]           [description]
     */
    public function displayCategories($rs_array)
    {
        if (!$rs_array) {
            echo "error!";
            return;
        }
        // echo "<ul>";
        foreach ($rs_array as $row) {
            $id = $row["catId"];
            $name = $row["catName"];
            echo "<li><a href=\"../news_list.php?catId=$id\">$name</a></li>";
        }
        // echo "</ul>";
        @mysql_close($this->conn);
    }

    /**
     * 类别以下拉列表的形式输出
     * @param  [type] $rs_array [description]
     * @return [type]           [description]
     */
    public function optionCategories($rs_array)
    {
        if (!$rs_array) {
            echo "error!";
            return;
        }
        echo "<select name=\"category\">";
        foreach ($rs_array as $row) {
            $id = $row["catId"];
            $name = $row["catName"];
            echo "<option value=\"$id\">$name</option>";
        }
        echo "</select>";
        @mysql_close($this->conn);
    }

    /**
     * 操作类别
     * @param  [type] $rs_array [description]
     * @return [type]           [description]
     */
    public function manageCategories($rs_array)
    {
        if (!$rs_array) {
            return false;
        }
        $i = 0;
        echo "<table><tr><th>序号</th><th>类别名称</th><th>操作</th></tr>";
        foreach ($rs_array as $row) {
            $i = $i + 1;
            $catId = $row["catId"];
            $catName = $row["catName"];
            echo "<tr><td>$i</td><td>$catName</td><td><a href=\"../categories_manage.php?catId=$catId\">删除</a></td></tr>";
        }
        echo "</table>";
        @mysql_close($this->conn);
    }

    /**
     * 增加一个类别，传入一个标签名，返回一个是否bool型的变量，判断是否成功
     * @param  [type] $catName [description]
     * @return [type]          [description]
     */
    public function insertCategories($catName)
    {
        $sql = "insert into categories(catName) values('$catName')";
        @mysql_query($sql, $this->conn);
        $id = @mysql_insert_id($this->conn);
        return $id;
        @mysql_close($this->conn);
    }

    /**
     * 由类别的Id更改类别的名字
     * @param  [type] $newCatName [description]
     * @param  [type] $catId      [description]
     * @return [type]             [description]
     */
    public function updateCategory($newCatName, $catId)
    {
        $sql = "update categories set catName = '$newCatName' where catId = $catId";
        @mysql_query($sql, $this->conn);
        if (@mysql_affected_rows() != -1) {
            return true;
        } else {
            return false;
        }
        @mysql_close($this->conn);
    }

    /**
     * 删除类别（连同其下的新闻和新闻评论一起删除）
     * @param  [type] $catId [description]
     * @return [type]        [description]
     * ！！！需要继续补充级联删除
     */
    public function deleteRow($catId)
    {
        $sql = "delete from categories where catId = $catId";
        $del = false;
        if (@mysql_query($sql, $this->conn)) {
            $del = true;
        } else {
            $del = false;
        }
        return $del;
        @mysql_close($this->conn);
    }

    /**
     * 由类别Id获取类别名
     * @param  [type] $catId [description]
     * @return [type]        [description]
     */
    public function getCatnameById($catId)
    {
        $rs = @mysql_query("select catName from categories where catId = '$catId'", $this->conn);
        if (!$rs) {
            return false;
        }
        if (@mysql_num_rows($rs) == 0) {
            return false;
        } else {
            $rs =@mysql_result($rs, 0, "catName");
            return $rs;
        }
        @mysql_close($this->conn);
    }

    /**
     * 由类别Id获取类别名
     * @param  [type] $catName [description]
     * @return [type]          [description]
     */
    public function getIdByCatname($catName)
    {
        $rs = @mysql_query("select catId from categories where catName = '$catName'", $this->conn);
        if (!$rs) {
            return false;
        }
        if (@mysql_num_rows($rs) == 0) {
            return false;
        } else {
            $rs =@mysql_result($rs, 0, "catId");
            return $rs;
        }
        @mysql_close($this->conn);
    }
}


/**
 * 测试代码
 */
/*
header("content-type:text/html;charset=utf8");
echo "ok";
$ca = new CategoryDAO();
var_dump($ca);

$rs_array=$ca->getCategories();
var_dump($rs_array);
$ca->displayCategories($rs_array);
$ca->optionCategories($rs_array);
var_dump($ca->updateCategory("政治新闻",2));
var_dump($ca->deleteRow(3));
$rs =$ca->getIdByCatname('国际新闻');
if ($rs) {
    echo $rs;
} else {
    echo "不存在";
}
$rs =$ca->getCatnameById(5);
if ($rs) {
    echo $rs;
} else {
    echo "不存在";
}
*/

 ?>




