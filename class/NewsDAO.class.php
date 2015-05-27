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
     * 获取所有新闻，返回一个二维数组
     * @return [type] [description]
     */
    public function getNewTenNews()
    {
        $rs = mysql_query("select * from news order by createTime desc limit 10", $this->conn);
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
        // if (!$rs_array) {
        //     return false;
        // }
        return $rs_array;

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
$rs_array=$ca->getNewTenNews();
var_dump($rs_array);

 ?>
