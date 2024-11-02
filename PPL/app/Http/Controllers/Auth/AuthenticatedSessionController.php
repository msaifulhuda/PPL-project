<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect()->route('home');
    }
    public function create(): View
    {
        return view('auth.login');
    }
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {

        $credentials = $request->only('username', 'password');
        if ($this->attemptLogin('web-superadmin', $credentials)) {
            return $this->handleAdminLogin($request);
        } elseif ($this->attemptLogin('web-siswa', $credentials)) {
            return $this->handleSiswaLogin($request);
        }elseif ($this->attemptLogin('web-guru', $credentials)) {
            return $this->handleGuruLogin($request);
        }elseif ($this->attemptLogin('web-staffakademik', $credentials)) {
            return $this->handleStaffakademikLogin($request);
        }elseif ($this->attemptLogin('web-staffperpus', $credentials)) {
            return $this->handleStaffperpusLogin($request);
        }
        return back()->withErrors([
            'password' => 'Password tidak cocok.',
        ])->withInput($request->only('username'));
    }
    private function attemptLogin($guard, $credentials): bool
    {
         // Debug guard dan kredensial untuk memastikan validasi
        //  dd($guard, $credentials);
        return auth()->guard($guard)->attempt($credentials);
    }

    private function handleSiswaLogin($request): RedirectResponse
    {

        $request->session()->regenerate();
        $user = auth()->guard('web-siswa')->user();
        $request->session()->put('username', $user->username);
        $request->session()->put('role_siswa', $user->role_siswa);

        if ($user->role_siswa === 'siswa    ') {
            return redirect()->route('siswa.dashboard');
        } elseif ($user->role_siswa === 'pengurus') {
            return redirect()->route('siswa.dashboard');
        }
        return back()->withErrors([
            'username' => 'Role tidak dikenali.'
        ])->onlyInput('username');
    }
    private function handleAdminLogin($request): RedirectResponse
    {
        $user = auth()->guard('web-superadmin')->user();

        $request->session()->regenerate();
        $request->session()->put('username', $user->username);

        return redirect()->route('superadmin.dashboard');
    }
    private function handleGuruLogin($request): RedirectResponse
    {
        $request->session()->regenerate();
        $user = auth()->guard('web-guru')->user();
        $request->session()->put('username', $user->username);
        $request->session()->put('role_guru', $user->role_guru);

        if ($user->role_guru === 'guru') {
            return redirect()->route('guru.dashboard');
        } elseif ($user->role_guru === 'pembina') {
            return redirect()->route('guru.dashboard');
        }
        return back()->withErrors([
            'username' => 'Role tidak dikenali.'
        ])->onlyInput('username');
    }
    private function handleStaffakademikLogin($request): RedirectResponse
    {

        $user = auth()->guard('web-staffakademik')->user();
        $request->session()->regenerate();
        $request->session()->put('username', $user->username);

        return redirect()->route('staff_akademik.dashboard');
    }
    private function handleStaffperpusLogin($request): RedirectResponse
    {
        $user = auth()->guard('web-staffperpus')->user();

        $request->session()->regenerate();
        $request->session()->put('username', $user->username);
        return redirect()->route('staff_perpus.dashboard');
    }
    /**
     * Destroy an authenticated session.
     */
    public function destroy_admin(Request $request): RedirectResponse
    {
        return $this->logout($request, 'web-superadmin');
    }

    public function destroy_staff_akademik(Request $request): RedirectResponse
    {
        return $this->logout($request, 'web-staffakademik');
    }
    public function destroy_staff_perpus(Request $request): RedirectResponse
    {
        return $this->logout($request, 'web-staffperpus');
    }
    public function destroy_siswa(Request $request): RedirectResponse
    {
        return $this->logout($request, 'web-siswa');
    }
    public function destroy_guru(Request $request): RedirectResponse
    {
        return $this->logout($request, 'web-guru');
    }

    private function logout(Request $request, string $guard): RedirectResponse
    {
        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
