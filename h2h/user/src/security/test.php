<?php

require 'sendSMSCode.php';
$send = new sendSMSCode();
$send->setMobile($_GET['m']);
$send->setCode($_GET['code']);
$response = $send->sendCode();
echo $response;