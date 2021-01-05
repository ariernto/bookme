<?php

	namespace App\Http\Middleware;

	use Closure;
	use Illuminate\Support\Facades\Redirect;
	use Illuminate\Contracts\Auth\MustVerifyEmail;

	class EnsureEmailIsVerified
	{
		/**
		 * Handle an incoming request.
		 *
		 * @param  \Illuminate\Http\Request  $request
		 * @param  \Closure  $next
		 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
		 */
		public function handle($request, Closure $next)
		{

			if (auth()->check() and ($request->user() instanceof MustVerifyEmail &&
					! $request->user()->hasVerifiedEmail())) {
				if(!$request->user()->role('administrator')){
				return $request->expectsJson()
					? abort(403, 'Your email address is not verified.')
					: Redirect::route('verification.notice');
				}

			}

			return $next($request);
		}
	}
