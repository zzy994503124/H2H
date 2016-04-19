<?php

/**
 * Created by PhpStorm.
 * User: zlg
 * Date: 2016/4/19
 * Time: 15:44
 */
require_once "/../DBBooks.php";

class DBBookstest extends PHPUnit_Framework_TestCase
{

    /**
     * id存在,查询书籍详情
     */
    public function testGetBookDetails(){
        $dbbooks = new DBBooks();
        $dbbooks->getDetails(1);
    }

    /**
     * id不存在,查询详情
     */
    public function testGetBookDetails10(){
        $dbbooks = new DBBooks();
        $dbbooks->getDetails(10);
    }

    /**
     * 获取ids
     */
    public function testGetBookIds(){
        $dbbooks = new DBBooks();
        $dbbooks->getBookIds();
    }

    /**
     * 获取存在的书籍id
     */
    public function testGetBookSimpleInfo(){
        $dbbooks = new DBBooks();
        $dbbooks->getSimpleInfoById(1);
    }

    /**
     * 获取不存在的书籍的id
     */
    public function testGetBookSimpleInfo10(){
        $dbbooks = new DBBooks();
        $dbbooks->getSimpleInfoById(10);
    }
}
