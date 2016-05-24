<?php
require_once dirname(__FILE__)."/../../../db/DBCart.php";
$email = $_POST['useremail'];


$dbcart = new DBCart();

$clear = $dbcart->clearCart($email);
if($clear > 0)
	echo 1;
	else echo 2;