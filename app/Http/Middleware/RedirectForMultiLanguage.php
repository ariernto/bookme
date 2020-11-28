<?php
	/**
	 * Created by PhpStorm.
	 * User: Admin
	 * Date: 7/11/2019
	 * Time: 4:54 PM
	 */

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Support\Arr;
	use Illuminate\Support\Facades\Config;
	use Modules\Language\Models\Language;

	class RedirectForMultiLanguage
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request $request
		 * @param  \Closure $next
		 * @param  string|null $guard
		 * @return mixed
		 */
		public function handle($request, Closure $next, $guard = null)
		{

			if (strpos($request->path(), 'install') === false && file_exists(storage_path() . '/installed') && strtolower($request->method()) === 'get' and $request->query('set_lang')) {

				$locale = $request->query('set_lang');
				$firstSegment = $request->segment(1);
				$languages = \Modules\Language\Models\Language::getActive();
				$localeCodes = Arr::pluck($languages, 'locale');
				$data = $request->query();
				unset($data['set_lang']);

				if($locale != $firstSegment and in_array($locale,$localeCodes)){

					$segments = $request->segments();
					if(!$firstSegment || in_array($firstSegment,$localeCodes)){
						if($locale != setting_item('site_locale')){
							$segments[0] = $locale;
						}else{ unset($segments[0]);}

					}else{
						$segments = Arr::prepend($segments, $locale);
					}
					$url = implode('/', $segments);
					if (!empty($data)) {
						$url .= '?' . http_build_query($data);
					}
					return redirect()->to($url);
				}

			}
			return $next($request);
		}
	}
