<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // ── WEB: Register ──────────────────────────────
    public function register(Request $request)
    {
        $fields = $request->validate([
            'name'     => ['required', 'min:3', 'max:10', Rule::unique('users', 'name')],
            'email'    => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:3', 'max:200']
        ]);

        $fields['password'] = bcrypt($fields['password']);
        $user = User::create($fields);
        Auth::login($user);
        return redirect('/');
    }

    // ── WEB: Login ─────────────────────────────────
    public function login(Request $request)
    {
        $fields = $request->validate([
            'loginname'     => 'required',
            'loginpassword' => 'required'
        ]);

        if (Auth::attempt(['name' => $fields['loginname'], 'password' => $fields['loginpassword']])) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }

        return back()->withErrors(['loginname' => 'Invalid username or password.']);
    }

    // ── WEB: Logout ────────────────────────────────
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    // ── WEB: Pages ─────────────────────────────────
    public function index()
    {
        $posts = Post::latest()->get();
        return view('homepage', ['posts' => $posts]);
    }

    public function dashboard()
    {
        $posts = Post::where('user_id', Auth::id())->latest()->get();
        return view('dashboard', ['posts' => $posts]);
    }

    // ── API: Register ──────────────────────────────
    public function apiRegister(Request $request)
    {
        $validator = validator($request->all(), [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'         => $user,
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ], 201);
    }

    // ── API: Login ─────────────────────────────────
    public function apiLogin(Request $request)
    {
        $validator = validator($request->all(), [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'         => $user,
            'access_token' => $token,
            'token_type'   => 'Bearer',
        ]);
    }

    // ── API: Logout ────────────────────────────────
    public function apiLogout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Logged out successfully']);
    }

    // ── API: Me ────────────────────────────────────
    public function me(Request $request)
    {
        return response()->json($request->user()->load('posts'));
    }
}
