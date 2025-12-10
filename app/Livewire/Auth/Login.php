<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function login()
    {
        $this->validate();

        $credentials = ['password' => $this->password];

        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $credentials['email'] = $this->email;
        } else {
            $credentials['nim'] = $this->email;
        }

        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            
            if (Auth::user()->role === 'admin') {
                return redirect('/dashboard');
            } else {
                return redirect('/products');
            }
        }

        $this->addError('username', 'NIM/Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
