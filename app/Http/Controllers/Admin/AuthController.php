<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Session;
use App\Models\User;
use Hash;

class AuthController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function showLoginForm(): View|Factory|Application
    {
        return view('admin.login');
    }


    /**
     * @param Request $request
     * @return mixed
     * @throws ValidationException
     */
    public function login(Request $request): mixed
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('administrator');
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    /**
     * @return Application|RedirectResponse|Redirector
     */
    public function logout() {
        Auth::logout();

        return redirect('administrator.login');
    }
}
