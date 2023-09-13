<?php

namespace App\Http\Controllers;


use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Mail;
use App\Mail\User\AfterRegister;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Http\Requests\Auth\LoginRequest;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
        
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        
        $callback = Socialite::driver('google')->stateless()->user();

        
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'password' => Hash::make($callback->password),
           
        ];

        // $user = User::firstOrCreate(['email' => $data['email']], $data);
        $user = User::whereEmail($data['email'])->first();
        if (!$user) {
            $user = User::create($data);
            Mail::to($user->email)->send(new AfterRegister($user));
        }

        $user->assignRole('user');
        event(new Registered($user));
        Auth::login($user, true);

        return redirect(route('frontend.user.dashboard'));
        // return redirect(RouteServiceProvider::HOME);

    }
}
