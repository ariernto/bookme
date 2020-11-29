<?php

namespace Modules\Sms\Core\Drivers;
use Modules\Sms\Core\Exceptions\SmsException;
use phpDocumentor\Reflection\DocBlock\Tags\Throws;

class NexmoDriver extends Driver
{

    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function send()
    {
    	$data = [
    		'from'=>$this->config['from'],
		    'text'=>$this->message,
		    'to'=>$this->recipient,
		    'api_key'=>$this->config['key'],
		    'api_secret'=>$this->config['secret'],
	    ];

	    $curl = $this->nexmoCurl($data);
	    $result = json_decode($curl,true);
	    if(!empty($result['messages'][0]['error-text'])){
	    	throw  new SmsException($result['messages'][0]['error-text']);
	    }
	    return $result;
    }
    public function nexmoCurl($data){
	    $ch = curl_init();
	    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_URL, $this->config['url']);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
	    curl_setopt($ch, CURLOPT_POST, count($data));
	    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
	    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
	    $result = curl_exec($ch);
	    curl_close($ch);
	    return $result;
	}


}