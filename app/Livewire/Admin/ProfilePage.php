<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ProfilePage extends Component
{
    public $user, $initials;

    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email|max:255')]
    public $email;

    #[Validate('required|string|max:20|regex:/^\+?[0-9]{10,15}$/')]
    public $phone_number;

    public function mount() {
        $this->user = User::where('id', Auth::id())->first();
        $names = explode(' ', $this->user->name);
        $this->initials = '';
        foreach (array_slice($names, 0, 2) as $n) {
            $this->initials .= strtoupper($n[0]);
        }

        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->phone_number = $this->user->phone_number;
    }

    public function update() {
        $user = User::find(Auth::id());
        if ($user) {
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone_number = $this->phone_number;

            $user->save();

            session()->flash('message', 'User updated successfully.');

            $this->user = User::where('id', Auth::id())->first();
            $names = explode(' ', $this->user->name);
            $this->initials = '';
            foreach (array_slice($names, 0, 2) as $n) {
                $this->initials .= strtoupper($n[0]);
            }

            $this->name = $this->user->name;
            $this->email = $this->user->email;
            $this->phone_number = $this->user->phone_number;
        }
    }

    public function render()
    {
        return view('livewire.admin.profile')->layout('components.layouts.dashboard');
    }
}
