<?php
	return[
		'default' => env('SMS_DRIVER', ''),
		'nexmo'=>[
			'url'=>'https://rest.nexmo.com/sms/json',
			'from'=>env('SMS_NEXMO_FROM','Booking Core'),
			'key'=>env('SMS_NEXMO_KEY',''),
			'secret'=>env('SMS_NEXMO_SECRET',''),
		],
		'twilio'=>[
			'url'=>'https://api.twilio.com',
			'from'=>env('SMS_TWILIO_FROM','+12019480710'),
			'sid'=>env('SMS_TWILIO_ACCOUNTSID',''),
			'token'=>env('SMS_TWILIO_TOKEN',''),
		],
	];