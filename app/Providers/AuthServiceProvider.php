<?php

    namespace App\Providers;

    use Illuminate\Support\Facades\Gate;
    use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
    use Modules\Tour\Models\Tour;
    use Modules\User\Policies\TourPolicy;

    class AuthServiceProvider extends ServiceProvider
    {
        /**
         * The policy mappings for the application.
         *
         * @var array
         */
        protected $policies = [
            // 'App\Model' => 'App\Policies\ModelPolicy',
//            Tour::class => TourPolicy::class
        ];

        /**
         * Register any authentication / authorization services.
         *
         * @return void
         */
        public function boot()
        {
            $this->registerPolicies();

            //
        }
    }
