<?php

require_once DBParameters;
/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/8
 * Time: 12:05
 */
class DBConnection
{
    private $dbname;
    private $host;
    private $username;
    private $psd;
    private $parameters;
    private $connection;
    public function __construct()
    {
        $this->parameters = new DBParameters();
        $this->dbname = $this->parameters->dbname;
        $this->host = $this->parameters->server;
        $this->username = $this->parameters->username;
        $this->psd = $this->parameters->psd;
        return $this->connDB();
    }

    //connect ...
    public function connDB(){
        $this->connection = new mysqli($this->host, $this->username,
            $this->psd, $this->dbname);
        if($this->connection->connect_error)
        {
            die("Connection error".$this->connection->connect_error);
        }
    }

    //disconnecting ...
    public function disconnectDB(){
        $this->connection->close();
    }
    
    public function getConnection(){
        return $this->connection;
    }

    /**
     * 加入愿望清单
     * @param $userId 用户id
     * @param $bookIds 书籍id数组
     */
    public function addToWishList($userId, $bookIds){

    }

    /**
     * 从愿望清单删除
     * @param $userId 用户id
     * @param $bookIds 书籍id 数组
     */
    public function deleteFromWishList($userId, $bookIds){

    }

    /**
     * 更新用户财富
     * @param $userId  用户id
     * @param $value 值
     */
    public function updateUserFortune($userId, $value)
    {

    }

}