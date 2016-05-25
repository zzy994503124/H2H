<?php

/**
 * 评论存储于读取，使用redis
 * @author zlg
 *
 */
class DBComment{
	
	private $redis;
	public function connectRedis(){
		$this->redis = new $redis();
		$this->redis->connect('127.0.0.1',6379);
		$this->redis->auth('z5456837722435826');
	}
	

	/**
	 * 添加书籍评论到数据库
	 * @param unknown $user
	 * @param unknown $book
	 * @param unknown $commment
	 */
	public function writeComment($user,$book,$commment){
		$this->connectRedis();
		$redis->hmset($book,array('user'=>$user,'comment'=>$commment));
	}
	
	/**
	 * 根据书籍id的读取评论数据
	 * @param unknown $book
	 */
	public function readComment($book)
	{
		return $redis->hmget($book,array('user','comment'));
	}
	
}