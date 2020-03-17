<?php

namespace App\Http\Controllers;

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
        $accounts = Account::where('user_id', Auth::id())->count();
        $funds = Summary::where('user_id', Auth::id())->get();
            dd($funds->pluck('total', 'name'));

        return view('dashboard')->with(compact('accounts', 'instantCash', 'allCash', 'debts'));
    }
}
