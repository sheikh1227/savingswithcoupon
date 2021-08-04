<?php

namespace App\Http\Controllers;

use App\Models\homeform;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $data=homeform::paginate(4);

        return view('Home.homepage',compact('data'));
    }

    public function contact()
    {
        return view('Home.Contact');
    }


}
