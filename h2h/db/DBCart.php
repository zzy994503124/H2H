<?php

/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/10
 * Time: 12:08
 */
class DBCart
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
    public function getCart($email,$username,$userpsd){
    	$this->connect();
    	$sql = "insert into usr(usereEmail, userPsd, username) values ('$email','$userpsd','$username')";
    	$result = $this->conn->query($sql);
    	$this->disconnect();
    	return $result;
    }
    
    /**
     * 检查登录
     * @param unknown $email
     * @param unknown $psd
     */
    public function checkLogin($email, $psd)
    {
    	$this->connect();
    	$sql = "select count(*) from usr where userEmail= '$email' and userPsd='$psd'";
    	$result = $this->conn->query($sql);
    	$this->disconnect();
    	return $result;
    }
    
    
    public function disconnect(){
    	$this->conn->close();
    }
}