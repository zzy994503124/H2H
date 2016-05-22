<?php

/**
 * 评论存储于读取，使用redis
 * @author zlg
 *
 */
class DBCart{
	
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
	public function writeComment($userid,$bookid){
		$this->connectRedis();
		$redis->lpush($user,$book);
		$redis->lpush();
	}
	
	/**
	 * 根据书籍id的读取评论数据
	 * @param unknown $book
	 */
	public function readComment($book)
	{
		
	}
	
}