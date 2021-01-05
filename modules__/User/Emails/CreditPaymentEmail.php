<?php

    namespace Modules\User\Emails;

    use Illuminate\Bus\Queueable;
    use Illuminate\Mail\Mailable;
    use Illuminate\Queue\SerializesModels;

    class CreditPaymentEmail extends Mailable
    {
        use Queueable, SerializesModels;

        public $token;
        const CODE = [
            'first_name' => '[first_name]',
            'last_name'  => '[last_name]',
            'email'      => '[email]',
            'amount'      => '[amount]',
            'credit'      => '[credit]',
            'create_user'      => '[create_user]',
            'payment_gateway'      => '[payment_gateway]',
            'status_name'      => '[status_name]',
        ];

        protected $payment;
        protected $is_new;
        protected $email_to;

        public function __construct($is_new,$payment,$email_to='admin')
        {
            $this->is_new = $is_new;
            $this->payment = $payment;
            $this->email_to = $email_to;
        }

        public function build()
        {
            if($this->email_to == 'admin'){
                $subject = setting_item_with_lang($this->is_new ? 'wallet_new_deposit_admin_subject' : 'wallet_update_deposit_admin_subject');
                $body = $this->replaceContentEmail(setting_item_with_lang($this->is_new ? 'wallet_new_deposit_admin_content' : 'wallet_update_deposit_admin_content'));

            }else{
                $subject = setting_item_with_lang($this->is_new ? 'wallet_new_deposit_customer_subject' : 'wallet_update_deposit_customer_subject');
                $body = $this->replaceContentEmail(setting_item_with_lang($this->is_new ? 'wallet_new_deposit_customer_content' : 'wallet_update_deposit_customer_content'));
            }

            return $this->subject($subject)->view('User::emails.blank')->with(['content' => $body,'payment'=>$this->payment,'email_to'=>$this->email_to,'is_new'=>$this->is_new]);
        }
        public function replaceContentEmail($content)
        {
            if (!empty($content)) {
                foreach (self::CODE as $item => $value) {
                    $replace = '';
                    switch ($item){
                        case "first_name":
                        case "last_name":
                            if($this->payment->user){
                                $replace = $this->payment->user->display_name;
                            }
                            break;
                        case "credit":
                            $replace = $this->payment->getMeta('credit');
                            break;
                        case "payment_gateway":
                            $replace = $this->payment->gatewayObj ? $this->payment->gatewayObj->getDisplayName() : '';
                            break;
                        default:
                            $replace = $this->payment->$item ?? '';
                            break;
                    }
                    $content = str_replace($value, $replace, $content);
                }
            }
            return $content;
        }


        public static function defaultNewBody()
        {
            $body = '
            <h1>Hello [first_name]!</h1>
            <p>New order has been made:</p>
            <p>User ID: [create_user]</p>
            <p>Amount: [amount]</p>
            <p>Credit: [credit]</p>
            <p>Gateway: [payment_gateway]</p>
            <p>Regards,<br>'.setting_item('site_title').'</p>';
            return $body;
        }
        public static function defaultUpdateBody()
        {
            $body = '
            <h1>Hello [first_name]!</h1>
            <p>Order has been updated:</p>
            <p>Order Status: <strong>[status_name]</strong></p>
            <p>User ID: [create_user]</p>
            <p>Amount: [amount]</p>
            <p>Credit: [credit]</p>
            <p>Gateway: [payment_gateway]</p>
            <p>Regards,<br>'.setting_item('site_title').'</p>';
            return $body;
        }
    }
