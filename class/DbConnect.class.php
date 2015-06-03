<?php
/**
 * 功能：连接到数据库
 */

// require_once './Db.conf.php';
date_default_timezone_set(TIMEZONE);

class DbConnect
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    public $conn;

    public function __construct($host = DB_HOST, $username = DB_USER, $password = DB_PASSWORD, $dbname = DB_NAME)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function db_connect()
    {
        $this->conn = @mysql_connect($this->host, $this->username, $this->password);
        @mysql_select_db($this->dbname);
        @mysql_query("set names utf8", $this->conn);
    }
}

/**
 * 测试代码
 */
/*
$db = new DbConnect();
$db->db_connect();
var_dump($db);
*/

 ?>
