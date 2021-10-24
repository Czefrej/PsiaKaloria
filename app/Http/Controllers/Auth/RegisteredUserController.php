<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
//            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'agreement' => ['accepted']
        ]);

        $uniqueness = User::isUniqueEmail($request->email);
        if($uniqueness === false)
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);

        $name = "PK-".strtoupper(substr(md5($request->email),-6));

        if ($uniqueness == USER::EMAIL_RECURRENT){
            $user = User::where('email',$request->email)->first();
            $user->password = Hash::make($request->password);
            $user->name = $name;
            $user->save();

        }else{

            $user = User::create([
                'name' => $name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        }

        event(new Registered($user));

        Auth::login($user);
        if($user->verified){
            return redirect(RouteServiceProvider::HOME);
        }else{
            return redirect()->route('verification.notice');
        }

    }
}
