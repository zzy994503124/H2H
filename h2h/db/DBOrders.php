<?php

/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/10
 * Time: 12:07
 */
class DBOrders
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
     * 获得用户订单
     * @param $userId
     */
    public function  getUserOrder($userId){

    }

    /**
     * 创建订单
     * @param $order 订单类
     */
    public function createUserOrder($order){
    
    	$bookId = $order['bookId'];
    	//$userId = $order['userId'];
    	$orderPhone = $order['phone'];
    	$rentDate = $order['rentDate'];
    	$returnDate = $order['returnDate'];
    	$returnAddr = $order['returnAddr'];
    	
    	$sql = "INSERT INTO book_order (bookId, orderPhone, rentDate, rentAddr, returnDate, returnAddr) 
    	VALUES ($bookId, $orderPhone, $rentDate, $returnDate,$returnAddr)";
    	$this->conn->query($sql);
    	$sql = "SELECT LAST_INSERT_ID()";
    	$orderId = $this->conn->query($sql);
    	return $orderId;
    }

    /**
     * 取消订单
     * @param $orderId 取消订单
     */
    public function  deleteUserOrder($orderId){

   }

}