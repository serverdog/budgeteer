<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Account;
use App\Models\Balance;
use App\Models\Summary;
use Illuminate\Support\Facades\Auth;

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
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $accounts = Account::count();
        $funds    = Summary::get();
        $details  = Balance::with(['Account','Account.Accounttype.Category'])->where('latest', 1)->get();
        $bills = Bill::get();
        //dd($bills->pluck('monthlyCost', 'name'));

        return view('home.dashboard')->with(compact('accounts', 'funds', 'details', 'bills'));
    }
}
