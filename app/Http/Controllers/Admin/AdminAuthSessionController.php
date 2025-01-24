<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthSessionController extends Controller
{
    public function create(): RedirectResponse|View
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.products');
        }
    
        return view('auth.admin-login');
    }

    public function store(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // if (Auth::user()->usertype !== 'admin') {
        //     Auth::logout();
        //     return redirect('admin/login')->withErrors(['email' => 'Unauthorized admin access.']);
        // }

        return redirect()->route('admin.products');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $user = $request->user();
  
        // if ($user) {
        //     $user->tokens()->delete();
        // }

        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('admin/login');
    }
}