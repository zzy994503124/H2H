
<?php
require_once dirname(__FILE__)."/../../../db/DBCart.php";
$email = $_POST['email'];
 //$email = "13301054@bjtu.edu.cn";

$dbcart = new DBCart();

$books = $dbcart->getCart($email);

foreach($books as $book)
{
	$bookNames[] = $book['bookName'];
	$prices[] = $book['rentPrice'];
}
$booknames = json_encode($bookNames);
$prs = json_encode($prices);

if($booknames == "null")
	echo "null";
else
echo $booknames."|".$prs;