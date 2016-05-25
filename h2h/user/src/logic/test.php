<?php
require_once dirname(__FILE__)."/../../../db/DBUsers.php";
$email = "13301054@bjtu.edu.cn";
$password = "123";

$dbusers = new DBUsers();

$login = $dbusers->checkLogin($email,$password);
if($login=="1")
	echo "1";
else echo "2";