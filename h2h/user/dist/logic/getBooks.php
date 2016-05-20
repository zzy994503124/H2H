<?php
require_once dirname(__FILE__)."/../../../db/DBBooks.php";
$dbbooks = new DBBooks();
$bookInfos = $dbbooks->getBookIds();
$simpleInfos = $dbbooks->getSimpleInfo();
foreach($bookInfos as $book)
{
	$ids[] = $book['bookId'];
	$bookNames[] = $book['bookName'];
	$publisher[] = $book['publisher'];
}	
$books = json_encode($ids);
$names = json_encode($bookNames);
$pbls = json_encode($publisher);

foreach ($simpleInfos as $bookinfo)
{
	$prices[] = $bookinfo['rentPrice'];
	$stocks[] = $bookinfo['bookNumber'];
}
$Stocks = json_encode($stocks);
$Prices = json_encode($prices);
echo "var bookIds = new Array();
		bookIds = $books;
	  var booknames = new Array;
	  booknames = $names;
	  var publishers = new Array();
	publishers = $pbls; 

	var bookPrices = new Array();
	bookPrices = $Prices;
	
	var bookStocks = new Array();
	bookStocks = $Stocks";
	
 ?>