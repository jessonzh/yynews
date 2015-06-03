<?php
/**
 * 功能：操作新闻的评论
 */

// require_once './DbConnect.class.php';

class CommentDAO
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
     * 获取新闻的所有评论，并输出
     * @param  [type] $newsId [description]
     * @return [type]         [description]
     */
    public function displayComments($newsId)
    {
        $rs = mysql_query("select content, createTime, userIP from comments where newsId = $newsId order by createTime desc limit 6", $this->conn);
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
        echo "<table><tr><th>内容</th><th>评论者</th><th>评论时间</th></tr>";
        foreach ($rs_array as $row) {
            $content = $row["content"];
            $createTime = $row["createTime"];
            $userIP = $row["userIP"];
            echo "<tr><td>$content</td><td>$userIP</td><td>$createTime</td></tr>";
        }
        echo "</table>";
        mysql_close($this->conn);
    }

    /**
     * 添加新闻
     * @param  [type] $content    [description]
     * @param  [type] $createTime [description]
     * @param  [type] $userIP     [description]
     * @param  [type] $newsId     [description]
     * @return [type]             [description]
     */
    public function insertComment($content, $createTime, $userIP, $newsId)
    {
        $sql = "insert into comments(content, createTime, userIP, newsId) values('$content', $createTime, '$userIP', $newsId);";
        mysql_query($sql, $this->conn);
        if (mysql_affected_rows() != -1) {
            return true;
        } else {
            return false;
        }
        mysql_close($this->conn);
    }

    /**
     * 删除评论
     * @param  [type] $commId [description]
     * @return [type]         [description]
     */
    public function deleteComment($commId)
    {
        $sql = "delete from comments where commId = $commId";
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
// header("content-type:text/html;charset=utf8");
// echo "ok";
// $ca = new CommentDAO();
// var_dump($ca);
// $ca->insertComment('测试评论', 20150528, '123.123.123.123', 2);
// $ca->displayComments(2);
// $ca->deleteComment(24);
 ?>
