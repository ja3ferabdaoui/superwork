<?php

namespace SuperWorks\Http\Controllers\ClientControllers;

use Illuminate\Http\Request;
use SuperWorks\Http\Controllers\Controller;
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
        $this->middleware('client');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = "Dashboard";
        $subTitle = "Dashboard";

        return view('clients.dashboard.index',compact('title', 'subTitle' ));
    }
    public function showFacebook()
    {
          return view('clients.dashboard.facebook');

    }
}
