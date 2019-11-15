<?php

namespace App\Http\Controllers\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
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
        $this->middleware('admin');
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
        $clientsCount = DB::table('clients')->count();
        $clientsNotActivatedCount = DB::table('clients')
            ->join('users', 'users.id', '=', 'clients.user_id')
            ->where('users.status', 0)
            ->count();
        $clientInactivatedAverage = ($clientsNotActivatedCount == 0) ? 0 : number_format((float)$clientsNotActivatedCount / $clientsCount * 100, 2, '.', '');
        $conversationsCount = DB::table('conversations')->count();
        $conversationsNotVIewedCount = DB::table('conversations')->where('status', 0)->count();
        $conversationNotViewedAverage = ($conversationsNotVIewedCount == 0) ? 0 : number_format((float)$conversationsNotVIewedCount / $conversationsCount * 100, 2, '.', '');
        return view('administration.dashboard.index',compact('title', 'subTitle','clientsCount', 'conversationsCount','conversationsNotVIewedCount','conversationNotViewedAverage',
        'clientInactivatedAverage', 'clientsNotActivatedCount' ));
    }

}
