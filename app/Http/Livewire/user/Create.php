<?php

namespace App\Http\Livewire\user;

use App\Mail\ShelterPassword;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Create extends Component
{
    public $username;
    public $email;
    public $role;
    public $message;

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function rules(){
        if(Auth::user()->role == "admin"){
            return ['role' => 'required|in:admin,moderator,shelter',
                'username'=> 'required|unique:users,name|gte:100000|lte:999999',
                'email'=> 'required|email|unique:users'
            ];
        }else {
            return ['role' => 'required|in:shelter',
                'username'=> 'required|unique:users,name|gte:100000|lte:999999',
                'email'=> 'required|email|unique:users'
            ];
        }
    }

    public function randomID(){
        $id = random_int(100000, 999999);
        while(true) {
            if (User::where('name', $id)->doesntExist()) {
                break;
            }
        }
        return $id;
    }

    public function mount(){
        $this->username = $this->randomID();
        $this->email = "";
        $this->role = "shelter";
        $this->message = "null";

    }


    public function render()
    {
        return view('livewire.user.create');
    }

    public function submit(){
        $this->validate();
        $password = $this->randomPassword();

        $user = new User();
        $user->password = Hash::make($password);
        $user->email = $this->email;
        $user->name = $this->username;
        $user->role = $this->role;
        $user->save();
        $user->sendEmailVerificationNotification();

        Mail::to($user)
            ->send(new ShelterPassword($password,$user->name,$user->email));

        session()->flash('message', "Konto $this->role o numerze $this->username zostało pomyślnie utworzone. Wygenerowane hasło zostało przesłane na maila $this->email.");
        return redirect()->route("account.user.create");
    }


}
