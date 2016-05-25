<?php
require_once dirname(__FILE__)."/../../../db/DBUsers.php";
$email = $_POST['useremail'];
$password = $_POST['userpassword'];

$dbusers = new DBUsers();

$login = $dbusers->checkLogin($email,$password);
if($login=="1")
	echo 1;
else echo 2;