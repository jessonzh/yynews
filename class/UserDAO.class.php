<?php
/**
 * 功能：操作用户
 */

// require_once './DbConnect.class.php';

class UserDAO
{
    private $conn;

    //构造函数，创建数据库连接
    public function __construct(){
        $db = new DbConnect();
        $db->db_connect();
        $this->conn = $db->conn;
    }

    /**
     * 判断密码是否正确
     * @param  string $value [description]
     * @return [type]        [description]
     */
    public function passwordIsRight($userName, $passWord)
    {
        $rs = mysql_query("select passWord from users where userName = '$userName'", $this->conn);
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
        foreach ($rs_array as $row) {
            $pass = $row["passWord"];
            if ($pass == $passWord) {
                return true;
            } else {
                return false;
            }
        }
        mysql_close($this->conn);
    }
}

/**
 * 测试代码
 */

// header("content-type:text/html;charset=utf8");
// echo "ok";
// $user = new UserDAO();
// var_dump($user);

// var_dump($user->passwordIsRight('admin', 123));

 ?>
