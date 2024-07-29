<?php

namespace App\Http\Controllers\Auth;

use App\Models\Pemohon;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function indexUser(): View
    {
        $pemohons = Pemohon::latest()->paginate(10);
        return view('admin.tableKoneksi', compact("pemohons"));
    }

    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): View
    {
        $request->authenticate();

        $request->session()->regenerate();

        $pemohons = Pemohon::latest()->paginate(10);
        return view('admin.tableKoneksi', compact('pemohons'));

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
