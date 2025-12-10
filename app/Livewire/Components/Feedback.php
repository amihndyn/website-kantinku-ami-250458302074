<?php

namespace App\Livewire\Components;

use Livewire\Component;
use App\Models\Feedback as FeedbackModel;
use Livewire\Attributes\Validate;

class Feedback extends Component
{
    #[Validate('required|string|max:255')]
    public $name;

    #[Validate('required|email|max:255')]
    public $email;

    #[Validate('required|string|max:255')]
    public $message;

    public function save() {
        FeedbackModel::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);
        session()->flash('feedback_success', 'Terima kasih! Feedback Anda telah dikirim dan akan segera kami tinjau.');
    }

    public function render()
    {
        return view('livewire.components.feedback');
    }
}