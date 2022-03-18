<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/my-info';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Redirect After auth user.
     * @param Request $request
     * @param User $user
     * @return RedirectResponse
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->isAdmin() ) {
            return  redirect()->route('blog.index');
        }

        if ($user->isPartner() ) {
           return  redirect()->route('partner.myInfo');
        }

        if ($user->isClient() ) {
            return redirect()->route('client.myInfo');
        }


        return redirect('/');
    }
}
