<?php

/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/10
 * Time: 12:08
 */
class DBUsers
{    
	private $conn = null;
    public function connect()
    {
     /*   $this->conn = new mysqli(DBParameters::$server, DBParameters::$username,
            DBParameters::$psd, DBParameters::$dbname);*/
    	//mysqli_query("set names utf8");
        $this->conn = new mysqli("localhost","root",
        		"", "h2h");
        $this->conn->query("SET NAMES utf8");
        if($this->conn->connect_error)
        {
            die("Connection error".$this->conn->connect_error);
        }
    }

/**
 * 注册新用户
 * @param unknown $email
 * @param unknown $username
 * @param unknown $userpsd
 */
    public function insertUser($email,$username,$userpsd){
    	$this->connect();
    	$sql = "insert into usr(userEmail, userPsd, username) values ('".$email."','".$userpsd."','".$username."');";
    	$result = $this->conn->query($sql);
		return $result;
		$this->disconnect();
    }
    
    /**
     * 检查登录
     * @param unknown $email
     * @param unknown $psd
     */
    public function checkLogin($email, $psd)
    {
    	$this->connect();
    	$sql = "SELECT * from usr where userEmail='".$email."' and userPsd='".$psd."';";
    	//$sql = "select * from usr";
    	$result = $this->conn->query($sql);

    	$raw=mysqli_fetch_array($result);
    	return sizeof($raw)/14;
    	$this->disconnect();
    	
    	//return mysql_num_rows($result);
    }
    
    
    public function disconnect(){
    	$this->conn->close();
    }
}