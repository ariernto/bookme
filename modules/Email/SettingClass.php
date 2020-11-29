<?php
namespace  Modules\Email;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    const EMAIL_DRIVER=[
        "smtp", "sendmail", "mailgun",  "ses","sparkpost", "postmark", "log", "array"
    ];
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'email',
                'title' => __("Email Settings"),
                'position'=>90,
                'view'=>"Email::admin.settings.email",
                "keys"=>[
                    'email_driver',
                    'email_host',
                    'email_port',
                    'email_encryption',
                    'email_username',
                    'email_password',
                    'email_mailgun_domain',
                    'email_mailgun_secret',
                    'email_mailgun_endpoint',
                    'email_postmark_token',
                    'email_ses_key',
                    'email_ses_secret',
                    'email_ses_region',
                    'email_sparkpost_secret',
                    'email_footer',
                    'email_header',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
