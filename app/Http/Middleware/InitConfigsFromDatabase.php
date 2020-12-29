<?php
	/**
	 * Created by PhpStorm.
	 * User: Admin
	 * Date: 7/10/2019
	 * Time: 9:25 AM
	 */

	namespace App\Http\Middleware;

	use Closure;
    use Illuminate\Broadcasting\Broadcasters\Broadcaster;
    use Illuminate\Broadcasting\BroadcastManager;
    use Illuminate\Support\Facades\Broadcast;
    use Illuminate\Support\Facades\Config;

	class InitConfigsFromDatabase
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \Closure $next
		 * @param string|null $guard
		 * @return mixed
		 */
		public function handle($request, Closure $next, $guard = null)
		{
			if (strpos($request->path(), 'install') === false && file_exists(storage_path() . '/installed')) {

				// Load Config from Database
				if (!empty(setting_item('email_from_address'))) {
					Config::set('mail.from.address', setting_item("email_from_address"));
				}
				if (!empty(setting_item('email_from_name'))) {
					Config::set('mail.from.name', setting_item("email_from_name"));
				}
				if (!empty(setting_item('site_timezone'))) {
					Config::set('app.timezone', setting_item("site_timezone"));
					date_default_timezone_set(config('app.timezone'));
				}

				// Load Email Config from Database
				if(!empty(setting_item('email_driver'))){
					Config::set('mail.driver',setting_item("email_driver"));
					switch (setting_item("email_driver")){
						case 'mailgun':
							if(!empty(setting_item('email_mailgun_domain'))){
								Config::set('services.mailgun.domain',setting_item("email_mailgun_domain"));
							}
							if(!empty(setting_item('email_mailgun_secret'))){
								Config::set('services.mailgun.secret',setting_item("email_mailgun_secret"));
							}
							if(!empty(setting_item('email_mailgun_endpoint'))){
								Config::set('services.mailgun.endpoint',setting_item("email_mailgun_endpoint"));
							}
							break;
						case 'postmark':
							if(!empty(setting_item('email_postmark_token'))){
								Config::set('services.postmark.token',setting_item("email_postmark_token"));
							}
							break;
						case 'ses':
							if(!empty(setting_item('email_ses_key'))){
								Config::set('services.ses.key',setting_item("email_ses_key"));
							}
							if(!empty(setting_item('email_ses_secret'))){
								Config::set('services.ses.secret',setting_item("email_ses_secret"));
							}
							if(!empty(setting_item('email_ses_region'))){
								Config::set('services.ses.region',setting_item("email_ses_region"));
							}
							break;
						case 'sparkpost':
							if(!empty(setting_item('email_sparkpost_secret'))){
								Config::set('services.sparkpost.secret',setting_item("email_sparkpost_secret"));
							}
							break;
					}
				}
				if(!empty(setting_item('email_host'))){
					Config::set('mail.host',setting_item("email_host"));
				}
				if(!empty(setting_item('email_port'))){
					Config::set('mail.port',setting_item("email_port"));
				}
				if(!empty(setting_item('email_encryption'))){
					Config::set('mail.encryption',setting_item("email_encryption"));
				}
				if(!empty(setting_item('email_username'))){
					Config::set('mail.username',setting_item("email_username"));
				}
				if(!empty(setting_item('email_password'))){
					Config::set('mail.password',setting_item("email_password"));
				}

				// Pusher
                if (!empty(setting_item('broadcast_driver'))) {
                    Config::set('broadcasting.default',setting_item('broadcast_driver','log'));
                }
                if (!empty(setting_item('pusher_api_key'))) {
                    Config::set('chatify.pusher.key', setting_item("pusher_api_key"));
                    Config::set('broadcasting.connections.pusher.key',setting_item('pusher_api_key'));
                }
                if (!empty(setting_item('pusher_api_secret'))) {
                    Config::set('chatify.pusher.secret', setting_item("pusher_api_secret"));
                    Config::set('broadcasting.connections.pusher.secret',setting_item('pusher_api_secret'));

                }
                if (!empty(setting_item('pusher_app_id'))) {
                    Config::set('chatify.pusher.app_id', setting_item("pusher_app_id"));
                    Config::set('broadcasting.connections.pusher.app_id',setting_item('pusher_app_id'));

                }
                if (!empty(setting_item('pusher_cluster'))) {
                    Config::set('chatify.pusher.options.cluster',setting_item('pusher_cluster'));
                    Config::set('broadcasting.connections.pusher.options.cluster',setting_item('pusher_cluster'));
                }
			}
			return $next($request);
		}
	}
