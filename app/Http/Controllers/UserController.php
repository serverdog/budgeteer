<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Webpatser\Countries\Countries;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge(['password' => Hash::make($request->get('password'))])->all());

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        $user = Auth::user()->fresh();
        $currencies = Currency::pluck('name', 'code');
        $countries = Countries::orderBy('name')->pluck('name', 'id');
        return view('users.edit', compact('user', 'currencies', 'countries'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User  $user)
    {
        if ($request->has('password') && !empty($request->get('password'))) {

            $user->update(
                $request->merge(['password' => Hash::make($request->get('password'))])
                    ->except([$request->get('password') ? '' : 'password']
            ));
        } else {
            $user->update(
                $request->merge(['user_id' => Auth::id()])->except('password')
            );
        }
        Auth::user()->fresh();
        currency()->setUserCurrency(Auth::user()->currency);
        return redirect()->route('dashboard')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
