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

 ?>
