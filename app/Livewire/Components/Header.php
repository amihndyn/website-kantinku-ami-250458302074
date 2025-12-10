<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $name, $email, $initials;

    public function mount() {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;

        $names = explode(' ', $user->name);
        $this->initials = '';
        foreach (array_slice($names, 0, 2) as $n) {
            $this->initials .= strtoupper($n[0]);
        }
    }

    public function render()
    {
        return view('livewire.components.header');
    }
}
