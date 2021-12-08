<?php
namespace  Modules\User;

use Modules\Core\Abstracts\BaseSettingsClass;

class SettingClass extends BaseSettingsClass
{
    public static function getSettingPages()
    {
        return [
            [
                'id'   => 'user',
                'title' => __("User Settings"),
                'position'=>50,
                'view'=>"User::admin.settings.user",
                "keys"=>[
                    'user_enable_login_recaptcha',
                    'user_enable_register_recaptcha',
                    'enable_mail_user_registered',
                    'user_content_email_registered',
                    'admin_enable_mail_user_registered',
                    'admin_content_email_user_registered',
                    'user_content_email_forget_password',
                    'inbox_enable',
                    'subject_email_verify_register_user',
                    'content_email_verify_register_user',
                    'user_disable_verification_feature',
                    'enable_verify_email_register_user',
                ],
                'html_keys'=>[

                ]
            ],
            [
                'id'   => 'wallet',
                'title' => __("Wallet Settings"),
                'position'=>50,
                'view'=>"User::admin.settings.wallet",
                "keys"=>[
                    'wallet_module_disable',

                    'wallet_credit_exchange_rate',
                    'wallet_deposit_type',
                    'wallet_deposit_rate',
                    'wallet_deposit_lists',

                    'wallet_new_deposit_admin_subject',
                    'wallet_new_deposit_admin_content',
                    'wallet_new_deposit_customer_subject',
                    'wallet_new_deposit_customer_content',

                    'wallet_update_deposit_admin_subject',
                    'wallet_update_deposit_admin_content',
                    'wallet_update_deposit_customer_subject',
                    'wallet_update_deposit_customer_content',
                ],
                'html_keys'=>[

                ]
            ]
        ];
    }
}
