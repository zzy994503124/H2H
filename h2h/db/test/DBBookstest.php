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

    public function testGetBookDetails(){
        $dbbooks = new DBBooks();
        $dbbooks->getDetails(10);
    }

    public function testGetBookIds(){
        $dbbooks = new DBBooks();
        $dbbooks->getBookIds();
    }

    public function testGetBookSimpleInfo(){
        $dbbooks = new DBBooks();
        $dbbooks->getSimpleInfoById(10);
    }
}
