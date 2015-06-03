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
        mysql_close($this->conn);
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
        mysql_close($this->conn);
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
        mysql_close($this->conn);
    }

    /**
     * 根据新闻ID取出该条新闻主体内容
     * @param  [type] $newsId [description]
     * @return [type]         [description]
     */
    public function displayNewsByNewsid($newsId)
    {
        $rs = mysql_query("select title, content, createTime from news where newsId = $newsId", $this->conn);
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
        // return $rs_array;
        echo "<table><tr><th>新闻标题</th><th>内容</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $content = $row["content"];
            $createTime = $row["createTime"];
            echo "<tr><td>$title</td><td>$content</td><td>$createTime</td></tr>";
        }
        echo "</table>";
        mysql_close($this->conn);
    }

    /**
     * 根据标题搜索新闻
     * @param  [type] $title [description]
     * @return [type]        [description]
     */
    public function searchNewsByTitle($title)
    {
        $rs = mysql_query("select title, content, createTime from news where title like '%$title%';", $this->conn);
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
        // return $rs_array;
        echo "<table><tr><th>新闻标题</th><th>内容</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $content = $row["content"];
            $createTime = $row["createTime"];
            echo "<tr><td>$title</td><td>$content</td><td>$createTime</td></tr>";
        }
        echo "</table>";
        mysql_close($this->conn);
    }

    /**
     * 根据内容搜索新闻
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function searchNewsByContent($content)
    {
        $rs = mysql_query("select title, content, createTime from news where content like '%$content%';", $this->conn);
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
        // return $rs_array;
        echo "<table><tr><th>新闻标题</th><th>内容</th><th>发布时间</th></tr>";
        foreach ($rs_array as $row) {
            $title = $row["title"];
            $content = $row["content"];
            $createTime = $row["createTime"];
            echo "<tr><td>$title</td><td>$content</td><td>$createTime</td></tr>";
        }
        echo "</table>";
        mysql_close($this->conn);
    }

    /**
     * 增加新闻
     * @param [type] $title      [description]
     * @param [type] $content    [description]
     * @param [type] $createTime [description]
     * @param [type] $catId      [description]
     */
    public function insertNews($title, $content, $createTime, $catId)
    {
        $sql = "insert into news(title, content, createTime, catId) values('$title', '$content', $createTime, $catId);";
        mysql_query($sql, $this->conn);
        if (mysql_affected_rows() != -1) {
            return true;
        } else {
            return false;
        }
        mysql_close($this->conn);
    }

    /**
     * 更改新闻的标题
     * @param  [type] $newsId [description]
     * @param  [type] $title  [description]
     * @return [type]         [description]
     */
    public function updateNewsTitle($newsId, $title)
    {
        $sql = "update news set title = '$title' where newsId = $newsId";
        mysql_query($sql, $this->conn);
        if (mysql_affected_rows() != -1) {
            return true;
        } else {
            return false;
        }
        mysql_close($this->conn);
    }

    /**
     * 更改新闻的内容
     * @param  [type] $newsId  [description]
     * @param  [type] $content [description]
     * @return [type]          [description]
     */
    public function updateNewsContent($newsId, $content)
    {
        $sql = "update news set content = '$content' where newsId = $newsId";
        mysql_query($sql, $this->conn);
        if (mysql_affected_rows() != -1) {
            return true;
        } else {
            return false;
        }
        mysql_close($this->conn);
    }

    /**
     * 删除新闻
     * TODO:需要级联删除评论，未完成
     * @param  [type] $newsId [description]
     * @return [type]         [description]
     */
    public function deleteNews($newsId)
    {
        $sql = "delete from news where newsId = $newsId";
        $del = false;
        if (mysql_query($sql, $this->conn)) {
            $del = true;
        } else {
            $del = false;
        }
        return $del;
        mysql_close($this->conn);
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
// $ca->displayNewsByNewsid(6);
// var_dump($ca->insertNews('标题竟然要唯一，这是什么鬼？？？', '测试新闻新闻', 20150528, 2));
// var_dump($rs_array);
// $ca->searchNewsByContent('美国');

 ?>
