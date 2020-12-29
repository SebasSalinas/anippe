<?php

namespace App\Http\Controllers\Portal\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/portal/dashboard';

    public function __construct()
    {
        $this->middleware('guest:portal')->except('logout');
    }

    public function showLoginForm()
    {
        return view('portal.auth.login');
    }

    protected function guard()
    {
        return Auth::guard('portal');
    }

    public function redirectTo()
    {
        return '/portal/dashboard';
    }
}
