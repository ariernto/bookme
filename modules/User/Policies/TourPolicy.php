<?php

    namespace Modules\User\Policies;

    use App\User;
    use Illuminate\Support\Facades\Auth;
    use Modules\Tour\Models\Tour;
    use Illuminate\Auth\Access\HandlesAuthorization;

    class TourPolicy
    {
        use HandlesAuthorization;

        /**
         * Determine whether the user can view any tours.
         *
         * @param \App\User $user
         * @return mixed
         */
        public $totalTour    = 0;
        public $vendorEnable = false;
        public $maxCreate    = false;
        public $autoPublish  = false;
        public $commission   = 0;

        public function __construct()
        {
            if (Auth::check()) {
                $user = Auth::user();
                if (in_array($user->status, ['publish'])) {
                    $vendor = $user->vendorPlanData;
                    $this->totalTour = Tour::where('create_user', $user->id)->count();
                    if (!empty($vendor) and $user->vendor_plan_enable ==1) {
                        $this->vendorEnable = !empty($vendor['tour']['enable']) ? true : false;
                        $this->maxCreate = !empty($vendor['tour']['maximum_create']) ? $vendor['tour']['maximum_create'] : false;
                        $this->autoPublish = !empty($vendor['tour']['auto_publish']) ? true : false;
                        $this->commission = !empty($vendor['tour']['commission']) ? $vendor['tour']['commission'] : 0;
                    }
                }

            }

        }


        public function viewAny(User $user)
        {
            if (!$this->vendorEnable) {
                abort('404', 'Tour has disable.');
            }
            //
        }

        /**
         * Determine whether the user can view the tour.
         *
         * @param \App\User $user
         * @param \App\Tour $tour
         * @return mixed
         */
        public function view(User $user, Tour $tour)
        {
            //
        }

        /**
         * Determine whether the user can create tours.
         *
         * @param \App\User $user
         * @return mixed
         */
        public function create(User $user)
        {

            if ($this->vendorEnable) {
                if ($this->maxCreate == false) {
                    return true;
                } else {
                    if ($this->totalTour < $this->maxCreate) {
                        return true;
                    } else {
                        abort('403', "You can't create tour");

                    }
                }
            } else {
                abort('403', "You can't create tour");
            }

        }

        /**
         * Determine whether the user can update the tour.
         *
         * @param \App\User $user
         * @param \App\Tour $tour
         * @return mixed
         */
        public function update(User $user, Tour $tour)
        {
            //
        }

        /**
         * Determine whether the user can delete the tour.
         *
         * @param \App\User $user
         * @param \App\Tour $tour
         * @return mixed
         */
        public function delete(User $user, Tour $tour)
        {
            //
        }

        /**
         * Determine whether the user can restore the tour.
         *
         * @param \App\User $user
         * @param \App\Tour $tour
         * @return mixed
         */
        public function restore(User $user, Tour $tour)
        {
            //
        }

        /**
         * Determine whether the user can permanently delete the tour.
         *
         * @param \App\User $user
         * @param \App\Tour $tour
         * @return mixed
         */
        public function forceDelete(User $user, Tour $tour)
        {
            //
        }
    }
