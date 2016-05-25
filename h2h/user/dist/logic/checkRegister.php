<?php
session_start();
if($_POST['code'] == $_SESSION['img_number']){
	echo "1";
}else{
	echo "2";
}
?>