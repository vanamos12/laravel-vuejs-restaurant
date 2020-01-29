<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Services\MenuService;
use \App\Services\RestaurantService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(MenuService $service, RestaurantService $restoService)
    {
        $resto_id = [1];
        $menus = $service->getMenuWithCategory($resto_id);
        //$menus = Menu::all();
        $restos = $restoService->userRestoAndTables();
        return view('home', compact('menus'));
    }
}
