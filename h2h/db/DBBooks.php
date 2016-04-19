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
    /*public function getSimpleInfoById($id){
    	$this->connect();
        $sql = "SELECT bookNumber, rentPrice from book_rent where bookId=$id";
        echo $sql;
        $result = $this->conn->query($sql);
        $this->disconnect();
        return $result;
        
    }*/

    /**
     * 获取详细信息
     * @param $id书籍id
     * return 书籍所有信息
     */
    public function getDetails($id){
    	
    	$this->connect();
    	$bookId = (int)$id;
        $sql = "SELECT bookName, rentPrice, bookDescription,bookNumber,publisher FROM book,book_rent where book.bookId = $id and book_rent.bookId = $id";
        //$sql = "SELECT * from book where bookId = $id";
      //  mysql_query("SET NAMES 'UTF8'");
     	$result = $this->conn->query($sql);


            while ($row = mysqli_fetch_array($result))
                $rows[] = $row;
       if(0 == $result->num_rows)
        {
            $rows[] =  null;
        }
            return $rows;
            //return implode("###",$rows);
            $this->disconnect();


    }


    public function disconnect(){
        $this->conn->close();
    }

}