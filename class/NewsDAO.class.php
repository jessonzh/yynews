<?php
/**
 * 功能：操作新闻
 */

require_once './DbConnect.class.php';

class NewsDAO
{
    private $conn;

    /**
     * 构造函数
     */
    public function __construct()
    {
        $db = new DbConnect();
        $db->db_connect();
        $this->conn = $db->conn;
    }

    /**
     * 获取最新的10条新闻，输出一个10行的表格
     * @return [type] [description]
     */
    public function displayNewTenNews()
    {
        $rs = mysql_query("select title, catName, createTime from news, categories where news.catId = categories.catId order by createTime desc limit 10", $this->conn);
        if (!$rs) {
            return false;
        }
        if (mysql_num_rows($rs) == 0) {
            return false;
        }
        $rs_array = array();
        while ($row = mysql_fetch_assoc($rs)) {
            $rs_array[] = $row;
        }
        if (!$rs_array) {
            return false;
        }
        return $rs_array;
        echo "<table><tr><th>新闻标题</th><th>所属类别</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $catId = $row["catName"];
            $createTime = $row["createTime"];

            echo "<tr>";
            echo "";
            echo "</tr>";
        }
        echo "</table>";

    }

    /**
     * 获取最热门的10条新闻，输出一个20行的表格
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function displayHotTenNews()
    {

    }

    /**
     * 将二维表的标题
     * @param  [type] $rs_array [description]
     * @return [type]           [description]
     */
    public function displayNews($rs_array)
    {

    }

}


/**
 * 测试代码
 */
header("content-type:text/html;charset=utf8");
echo "ok";
$ca = new NewsDAO();
var_dump($ca);
$rs_array=$ca->displayNewTenNews();
var_dump($rs_array);

 ?>
