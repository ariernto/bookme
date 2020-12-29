<?php

    namespace Modules\Vendor\Listeners;

    use Illuminate\Support\Facades\Mail;
    use Modules\User\Emails\RegisteredEmail;
    use Modules\User\Emails\VendorRegisteredEmail;
    use Modules\User\Events\NewVendorRegistered;
    use Modules\User\Events\SendMailUserRegistered;
    use Modules\User\Models\User;
    use Modules\Vendor\Emails\PayoutRequestChangedEmail;
    use Modules\Vendor\Emails\PayoutRequestCreatedEmail;
    use Modules\Vendor\Emails\PayoutRequestDeletedEmail;
    use Modules\Vendor\Emails\PayoutRequestRejectedEmail;
    use Modules\Vendor\Events\PayoutRequestEvent;

    class PayoutRequestNotificationListener
    {
        /**
         * Create the event listener.
         *
         * @return void
         */
        public $user;

        public function __construct(User $user)
        {
            $this->user = $user;
        }

        /**
         * Handle the event.
         *
         * @param PayoutRequestEvent $event
         *
         * @return void
         */
        public function handle(PayoutRequestEvent $event)
        {

            switch ($event->action){
                case "insert":
                    $this->sendEmailCreate($event);
                    break;
                case "update":
                    $this->sendEmailUpdate($event);
                    break;
                case "reject":
                    $this->sendEmailReject($event);
                    break;
                case "delete":
                    $this->sendEmailDelete($event);
                    break;
            }

        }

        protected function sendEmailCreate($event){

            if($event->user->locale){
                $old = app()->getLocale();
                app()->setLocale($event->user->locale);
            }

            Mail::to($event->user->email)->send(new PayoutRequestCreatedEmail($event->user,$event->payout_request,'vendor'));

            if(!empty($old)){
                app()->setLocale($old);
            }


            if (!empty(setting_item('admin_email'))) {
                Mail::to(setting_item('admin_email'))->send(new PayoutRequestCreatedEmail($event->user,$event->payout_request, 'admin'));
            }
        }

        protected function sendEmailUpdate($event){

            if($event->user->locale){
                $old = app()->getLocale();
                app()->setLocale($event->user->locale);
            }

            Mail::to($event->user->email)->send(new PayoutRequestChangedEmail($event->user,$event->payout_request,'vendor'));

            if(!empty($old)){
                app()->setLocale($old);
            }


            if (!empty(setting_item('admin_email'))) {
                Mail::to(setting_item('admin_email'))->send(new PayoutRequestChangedEmail($event->user,$event->payout_request, 'admin'));
            }
        }

        protected function sendEmailReject($event){

            if($event->user->locale){
                $old = app()->getLocale();
                app()->setLocale($event->user->locale);
            }

            Mail::to($event->user->email)->send(new PayoutRequestRejectedEmail($event->user,$event->payout_request,'vendor'));

            if(!empty($old)){
                app()->setLocale($old);
            }


            if (!empty(setting_item('admin_email'))) {
                Mail::to(setting_item('admin_email'))->send(new PayoutRequestRejectedEmail($event->user,$event->payout_request, 'admin'));
            }
        }
        protected function sendEmailDelete($event){

            if($event->user->locale){
                $old = app()->getLocale();
                app()->setLocale($event->user->locale);
            }

            Mail::to($event->user->email)->send(new PayoutRequestDeletedEmail($event->user,$event->payout_request,'vendor'));

            if(!empty($old)){
                app()->setLocale($old);
            }


            if (!empty(setting_item('admin_email'))) {
                Mail::to(setting_item('admin_email'))->send(new PayoutRequestDeletedEmail($event->user,$event->payout_request, 'admin'));
            }
        }


    }
