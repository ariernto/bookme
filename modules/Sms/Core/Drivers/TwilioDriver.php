<?php

	namespace Modules\Sms\Core\Drivers;
	use Modules\Sms\Core\Exceptions\SmsException;

	class TwilioDriver extends Driver
	{

		protected $config;

		public function __construct($config)
		{
			$this->config = $config;
		}

		public function send()
		{
			$data = [
				'To'=>$this->recipient,
				'From'=>$this->config['from'],
				'Body'=>$this->message
			];
			$url = $this->config['url'].'/2010-04-01/Accounts/'.$this->config['sid'].'/Messages.json';
			$curl = $this->curl($url,$data);
			$result = json_decode($curl,true);
			if(!empty($result['error_code'])){
				throw new SmsException($result['error_message']);
			}
			if(!empty($result['code']) and is_numeric($result['code'])){
				throw new SmsException($result['message']);
			}
			return $result;
		}

		public function curl($url,$data){
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_USERPWD, $this->config['sid'].':'.$this->config['token']);
			curl_setopt($ch, CURLOPT_POST, count($data));
			curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
			$data = curl_exec($ch);
			curl_close($ch);
			return $data;

		}


	}