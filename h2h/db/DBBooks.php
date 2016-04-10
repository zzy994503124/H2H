<?php

/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/10
 * Time: 11:48
 */
require_once DBParameters;
class DBBooks
{

    private $conn;

    public function connect()
    {
        $this->conn = new mysqli(DBParameters::$server, DBParameters::$username,
            DBParameters::$psd, DBParameters::$dbname);
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
        $sql = "SELECT bookId from book";
        $result = $this->conn->query($sql);
        return $result;
        
    }

    /**
     * 获取简略信息
     * 返回 数组 每个元素包含 书名 作者 图片文件夹路径
     * @param $ids id列表
     */
    public function getSimpleInfo($id){
        $sql = "SELECT bookNumber, rentPrice from book_rent where bookId = $id";
        $result = $this->conn->query($sql);
        return $result;
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