<?php

/**
 * 作为mysql book表的缓存，缓存关于书籍的信息
 * @author zlg
 *
 */

class DBRedisBook{
	
	private $redis;
	public function connectRedis(){
		$this->redis = new $redis();
		$this->redis->connect('127.0.0.1',6379);
		$this->redis->auth('z5456837722435826');
	}
	
	/**
	 * 缓存书籍信息
	 * @param unknown $bookid
	 * @param unknown $bookname
	 * @param unknown $author
	 * @param unknown $publishedDate
	 * @param unknown $gotDate
	 * @param unknown $totalPrice
	 * @param unknown $bookDescription
	 * @param unknown $filePath
	 * @param unknown $publisher
	 */
	public function storeBook($bookid,$bookname,$author,$publishedDate,$gotDate,
		$totalPrice, $bookDescription,$filePath, $publisher	){
		$redis->hmset($bookid,array('bookname'=>$bookname,'bookprice'=>$totalPrice,'author'=>$author,'path'=>$filePath,'publisher'=>$publisher,
				'description'=>$bookDescription,'publisheddate'=>$publishedDate,'gotdate'=>$gotDate
		));
	}
	
	/**
	 * 从缓存读取书籍信息
	 * @param unknown $bookId
	 */
	public function getBookInfo($bookId){
		return $redis->hmget($bookid,array('bookname','bookprice','author','path','publisher','description'));
		
		
	}
}