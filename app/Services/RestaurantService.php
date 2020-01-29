<?php 
    namespace App\Services;
    use Illuminate\Support\Facades\Auth;

    class RestaurantService{
        public function userRestoAndTables(){
            return Auth::user()
                ->restaurants()
                ->get();
        } 
    }