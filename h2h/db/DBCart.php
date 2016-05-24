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
 * 读取购物车书籍
 * @param unknown $email 用户email
 */
    public function getCart($email){
    	$this->connect();
    	$sql = "select bookName,rentPrice from book_rent, book,cart where 
    			book.bookId = book_rent.bookId and book.bookId = cart.bookId 
    			and userEmail='".$email."';";
    	
    	$result = $this->conn->query($sql);
    	while ($row = mysqli_fetch_array($result))
    		$rows[] = $row;
    		return $rows;
    	$this->disconnect();
    }
    
    /**
     * 加入购物车
     * @param unknown $email
     * @param unknown $bookId
     */
    public function addToCart($email, $bookId)
    {
    	$this->connect();
    	$sql = "insert into cart values ('".$email."','".$bookId."');";
    	$result = $this->conn->query($sql);
    	$this->disconnect();
    	return $result;
    }
    
    /**
     * 清空购物车
     * @param unknown $email 用户邮箱
     * @return unknown
     */
    public function clearCart($email)
    {
    	$this->connect();
    	$sql = "delete from cart where userEmail = '".$email."';";
    	$result = $this->conn->query($sql);
    	$this->disconnect();
    	return $result;
    }
    public function disconnect(){
    	$this->conn->close();
    }
}