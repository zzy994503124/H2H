<?php
require_once dirname(__FILE__)."/../../../db/DBUsers.php";
$email=$_POST['useremail'];
$password=$_POST['userpassword'];

$username=$_POST['username'];

$dbusers = new DBUsers();
$result = $dbusers->insertUser($email,$username,$password);

if ($result == 1)
	echo 1;
else 
	echo 2;