<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;

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
        $totalSum = Items::sum('price');
        $totaltitle = Items::count('Title');
        return view('home', compact('totalSum','totaltitle'));
    }
    
}
