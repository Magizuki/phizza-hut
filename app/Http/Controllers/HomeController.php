<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pizza;

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
    public function index()
    {
        $pizzas = Pizza::paginate(6);
        return view('home', ['pizzas' => $pizzas]);
    }

    public function guest()
    {
        return view('guest.index');
    }
}
