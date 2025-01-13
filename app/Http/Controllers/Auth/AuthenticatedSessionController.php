<?php

namespace App\Http\Controllers\Auth;

use App\Models\Option;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;


class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        $login_page = Option::where('key','login-page')->first();
        return view('auth.login',compact('login_page'));
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        $remember = $request->filled('remember') ? 1 : 0;
        $user = auth()->user();
        $role = Role::where('name', $user->role)->first();
        $first_role = $role->permissions->pluck('name')->all()[0]; // get auth user first page permission.
        $page = explode('-', $first_role);

        if ($page[0] == 'reports') {
            $first_role = $role->permissions->pluck('name')->all()[1];
            $page = explode('-', $first_role);
        }

        return response()->json([
            'message' => __('Logged In Successfully'),
            'remember' => $remember,
            'redirect' => route('admin.dashboard'),
        ]);

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
