<?php
header("Content-Type:text/html;charset=utf-8");
class sendSMSCode
{
	private $code = 0000;
	private $apikey = "9d7e54fa72c3b937045fb6dd2de38bb1"; //修改为您的apikey(https://www.yunpian.com)登陆官网后获取
	
	public function  setMobile($mobile){
		$this->mobile = $mobile;
	}
	
	public function setCode($code){
		$this->code=$code;
	}
	
	public function getCode(){
		return $this->code;
	}
	
	public function sendCode(){
		$text="【租书网】您的验证码是$this->code";
		$ch = curl_init();
		
		/* 设置验证方式 */
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));
		
		/* 设置返回结果为流 */
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
		/* 设置超时时间*/
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		
		/* 设置通信方式 */
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		// 取得用户信息
		$json_data = $this->get_user($ch,$this->apikey);
		$array = json_decode($json_data,true);
	//	echo '<pre>';print_r($array);
		// 发送短信
		$data=array('text'=>$text,'apikey'=>$this->apikey,'mobile'=>$this->mobile);
		$json_data = $this->send($ch,$data);
		$array = json_decode($json_data,true);
		//echo '<pre>';print_r($array);
		
		curl_close($ch);
		
		return $this->code;
	}
	
	//获得账户
	function get_user($ch,$apikey){
		curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/user/get.json');
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array('apikey' => $apikey)));
		return curl_exec($ch);
	}
	function send($ch,$data){
		curl_setopt ($ch, CURLOPT_URL, 'https://sms.yunpian.com/v2/sms/single_send.json');
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		return curl_exec($ch);
	}	
	
}


