<?php

/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/10
 * Time: 11:48
 */
//require_once dirname(__FILE__).'\DBParameters';
class DBBooks
{

    private $conn = null;
    public function connect()
    {
     /*   $this->conn = new mysqli(DBParameters::$server, DBParameters::$username,
            DBParameters::$psd, DBParameters::$dbname);*/
        $this->conn = new mysqli("localhost","root",
        		"", "h2h");
        if($this->conn->connect_error)
        {
            die("Connection error".$this->conn->connect_error);
        }
    }

    /**
     * 获取所有书籍的id
     * 返回数组
     */
    public function getBookIds()
    {
    	$this->connect();
        $sql = "SELECT * from book";
        $result = $this->conn->query($sql);
        while ($row = mysqli_fetch_array($result))
        	$rows[] = $row;
        return $rows;
      //  return $result.toString();
        $this->disconnect();
        
    }

    /**
     * 获取简略信息
     * 返回 数组 每个元素包含 书名 作者 图片文件夹路径
     * @param $ids id列表
     */
    public function getSimpleInfo(){
    	$this->connect();
    	$sql = "SELECT bookNumber, rentPrice from book_rent";
    	$result = $this->conn->query($sql);
    	while ($row = mysqli_fetch_array($result))
        	$rows[] = $row;
        	return $rows;
    	$this->disconnect();
    }
    /**
     * 获取简略信息
     * 返回 数组 每个元素包含 书名 作者 图片文件夹路径
     * @param $ids id列表
     */
    public function getSimpleInfoById($id){
    	$this->connect();
        $sql = "SELECT bookNumber, rentPrice from book_rent where bookId = $id";
        $result = $this->conn->query($sql);
        return $result;
        $this->disconnect();
    }

    /**
     * 获取详细信息
     * @param $id书籍id
     * return 书籍所有信息
     */
    public function getDetails($id){
        $sql = "SELECT * FROM book where bookId = $id";
        $result = $this->conn->query($sql);
        return $result;
    }


    public function disconnect(){
        $this->conn->close();
    }

}