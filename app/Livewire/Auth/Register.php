<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $nim;
    public $phone_number;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users,email',
        'nim' => 'required|unique:users,nim',
        'phone_number' => 'required|unique:users,phone_number',
        'password' => 'required|min:6|confirmed'
    ];

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'nim' => $this->nim,
            'phone_number' => $this->phone_number,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('success', 'Akun berhasil dibuat. Silakan login.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
