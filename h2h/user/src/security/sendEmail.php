<?php
// 必要导入
require("class.phpmailer.php");
require("class.smtp.php");
date_default_timezone_set('Asia/Shanghai');//设定时区东八区
$mail = new PHPMailer(); //建立邮件发送类

$address = $_POST['useremail'];
$address = "13301054@bjtu.edu.cn";
$mail->IsSMTP(); // 使用SMTP方式发送
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->CharSet ="UTF-8";//设置编码，否则发送中文乱码
$mail->Host = "smtp.qq.com"; // 您的企业邮局域名
$mail->SMTPAuth = true; // 启用SMTP验证功能
$mail->Username = "1054461165@qq.com"; // 邮局用户名(请填写完整的email地址)
$mail->Password = "qgznntulyautbcbi"; // 邮局密码

//$mail->SMTPDebug = 1;


$mail->From = "1054461165@qq.com"; //邮件发送者email地址
$mail->FromName = "h2h surport";
$mail->AddAddress($address, "张利高");//收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
//$mail->AddReplyTo("", "");

$mail->IsHTML(true); // set email format to HTML //是否使用HTML格式

$mail->Subject = "H2H:欢迎注册"; //邮件标题
$mail->Body = "
		<h2>亲爱的用户</h2>
		<p>H2H欢迎您</p>
		<a href = \"http:////h2h.com\confirmSucceed.html?email=$address\">点击验证邮箱</a>
		<p>若非本人操作，请忽略</p>"; //邮件内容
$mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略

if(!$mail->Send()) {
	echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
	echo 1;
}
