<?php

	namespace Modules\Sms;

	use Modules\Core\Abstracts\BaseSettingsClass;

	class SettingClass extends BaseSettingsClass
	{
		const SMS_DRIVER = [
			"log", "nexmo", "twilio"
		];

		public static function getSettingPages()
		{
			return [
				[
					'id'        => 'sms',
					'title'     => __("Sms Settings"),
					'position'  => 100,
					'view'      => "Sms::admin.settings.sms",
					"keys"      => [
						'sms_driver',
						'sms_nexmo_api_key',
						'sms_nexmo_api_secret',
						'sms_nexmo_api_from',
						'sms_twilio_api_from',
						'sms_twilio_account_sid',
						'sms_twilio_account_token',


//						 Admin phonenumber config
						'admin_phone_has_booking',
						'admin_country_has_booking',
//						event create booking
						'enable_sms_admin_has_booking',
						'sms_message_admin_when_booking',
						'enable_sms_vendor_has_booking',
						'sms_message_vendor_when_booking',
						'enable_sms_user_has_booking',
						'sms_message_user_when_booking',
//						event update booking
						'enable_sms_admin_update_booking',
						'sms_message_admin_update_booking',
						'enable_sms_vendor_update_booking',
						'sms_message_vendor_update_booking',
						'enable_sms_user_update_booking',
						'sms_message_user_update_booking',


					],
					'html_keys' => [

					]
				]
			];
		}
	}
