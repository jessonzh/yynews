<?php
/**
 * 功能：操作新闻的评论
 */

require_once './DbConnect.class.php';

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


}

 ?>
