<?php
require_once dirname(__FILE__)."/../../../db/DBCart.php";
$email = $_POST['useremail'];
$bookid = $_POST['bookid'];
//$email = "13301054@bjtu.edu.cn";
//$bookid = 00000004;
$dbcart = new DBCart();

$add = $dbcart->addToCart($email,$bookid);
if($add=="1")
	echo 1;
	else echo 2;