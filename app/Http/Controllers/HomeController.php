<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Income;
use App\Models\Account;
use App\Models\Article;
use App\Models\Balance;
use App\Models\Summary;
use App\Models\HistorySummary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{


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
        $history = HistorySummary::orderBy('date')->get();
        $user = Auth::user()->fresh();
        $income = Income::get();

        $setup = collect([
            'accounts' => $accounts == 0 ? true : false,
            'bills' => $bills->count() < 1 ? true : false,
            'income' => $income->count() < 1 ? true : false,
            'balances' => $details->count() < 1 ? true : false,
        ]);

        return view('home.dashboard')->with(compact('accounts', 'funds', 'details', 'bills', 'history', 'user', 'income', 'setup'));
    }

    public function home()
    {
        $articles = Article::limit(5)->get();
        return view('home.welcome')->with(compact('articles'));
    }
}
