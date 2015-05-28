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
        echo "<table><tr><th>新闻标题</th><th>所属类别</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $catId = $row["catName"];
            $createTime = $row["createTime"];
            echo "<tr><td>$title</td><td>$catId</td><td>$createTime</td></tr>";
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
        $rs = mysql_query("select title, catName, news.createTime
                           from categories, news, comments
                           where news.catId = categories.catId and news.newsId = comments.newsId
                           group by comments.newsId
                           order by count(*) desc
                           limit 10;", $this->conn);
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
        echo "<table><tr><th>新闻标题</th><th>所属类别</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $catId = $row["catName"];
            $createTime = $row["createTime"];
            echo "<tr><td>$title</td><td>$catId</td><td>$createTime</td></tr>";
        }
        echo "</table>";
    }

    /**
     * 根据类别ID取出该类别下的所有新闻
     * @param  [type] $catId [description]
     * @return [type]        [description]
     */
    public function displayNewsByCatid($catId)
    {
        $rs = mysql_query("select title, catName, createTime from news, categories where (news.catId = categories.catId) and (news.catId = $catId) order by createTime desc limit 20", $this->conn);
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
        echo "<table><tr><th>新闻标题</th><th>所属类别</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $catId = $row["catName"];
            $createTime = $row["createTime"];
            echo "<tr><td>$title</td><td>$catId</td><td>$createTime</td></tr>";
        }
        echo "</table>";
    }

    /**
     * 根据新闻ID取出该条新闻主体内容
     * @param  [type] $newsId [description]
     * @return [type]         [description]
     */
    public function displayNewsByNewsid($newsId)
    {

    }

    /**
     * 增加新闻
     * @param [type] $title      [description]
     * @param [type] $content    [description]
     * @param [type] $createTime [description]
     * @param [type] $catId      [description]
     */
    public function addNews($title, $content, $createTime, $catId)
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
// $ca->displayNewTenNews();
// $ca->displayHotTenNews();
$ca->displayNewsByCatid(6);
// var_dump($rs_array);

 ?>
