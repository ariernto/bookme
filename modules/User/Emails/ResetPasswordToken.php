<?php

    namespace Modules\User\Emails;

    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class ResetPasswordToken extends Mailable
    {
        use Queueable, SerializesModels;

        public $token;
        public $user;
        const CODE = [
            'first_name'    => '[first_name]',
            'last_name'     => '[last_name]',
            'name'          => '[name]',
            'email'         => '[email]',
            'buttonReset' => '[button_reset_password]',
        ];

        public function __construct($token,$user)
        {
            $this->token = $token;
            $this->user= $user;
        }

        public function build()
        {
            $subject = __('Reset Password');
            if (!empty(setting_item('user_content_email_forget_password'))) {
                $body = $this->replaceContentEmail(setting_item_with_lang('user_content_email_forget_password',app()->getLocale()));
            } else {
                $body = $this->defaultBody();
            }
            return $this->subject($subject)->view('User::emails.forgotPassword')->with(['content' => $body]);
        }
        public function replaceContentEmail($content)
        {
            if (!empty($content)) {
                foreach (self::CODE as $item => $value) {

                    if($item == "buttonReset") {
                        $content = str_replace($value, $this->buttonReset(), $content);
                    }

                    $content = str_replace($value, @$this->user->$item, $content);
                }
            }
            return $content;
        }


        public function defaultBody()
        {
            $body = '
            <h1>Hello!</h1>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <p style="text-align: center">' . $this->buttonReset() . '</p>
            <p>This password reset link expire in 60 minutes.</p>
            <p>If you did not request a password reset, no further action is required.
            </p>
            <p>Regards,<br>'.setting_item('site_title').'</p>';
            return $body;
        }

        public function buttonReset()
        {
            $link = route('password.reset',['token'=>$this->token]);
            $button = '<a style="border-radius: 3px;
                color: #fff;
                display: inline-block;
                text-decoration: none;
                background-color: #3490dc;
                border-top: 10px solid #3490dc;
                border-right: 18px solid #3490dc;
                border-bottom: 10px solid #3490dc;
                border-left: 18px solid #3490dc;" href="' . $link . '">Reset Password</a>';
            return $button;
        }
    }
