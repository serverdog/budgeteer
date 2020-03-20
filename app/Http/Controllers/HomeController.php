<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Account;
use App\Models\Balance;
use App\Models\Summary;
use App\Models\HistorySummary;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

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

/*        $password = 'password';
        $secret = "Mortgage details";
        $key= pbkdf2($password, Config::get('app.key'));
        Crypt::setKey($key);
        $encypted = Crypt::encrypt($input);
        $decypted = Crypt::decrypt($encypted);
        dd($key, $encrypted, $decrypted);
*/
        $accounts = Account::count();
        $funds    = Summary::get();
        $details  = Balance::with(['Account','Account.Accounttype.Category'])->where('latest', 1)->get();
        $bills = Bill::get();
        $history = HistorySummary::get();
        $user = Auth::user()->fresh();

        return view('home.dashboard')->with(compact('accounts', 'funds', 'details', 'bills', 'history', 'user'));
    }
}
