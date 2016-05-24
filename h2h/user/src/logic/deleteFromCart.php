<?php
require_once dirname(__FILE__)."/../../../db/DBCart.php";
$email = $_POST['email'];
$bookname = $_POST['bookname'];

$dbcart = new DBCart();

$delete = $dbcart->deleteFromCart($email,$bookname);
if($delete=="1")
	echo 1;
	else echo 2;