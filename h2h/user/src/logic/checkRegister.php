<?php
require_once dirname(__FILE__)."/../../../db/DBUsers.php";
//$email=$_POST['useremail'];
//$password=$_POST['userpassword'];

//$username=$_POST['username'];
$email="1@bjtu.edu.cn";
$password="1";
$username="1";

$dbusers = new DBUsers();
$result = $dbusers->insertUser($email,$username,$password);

echo $result;