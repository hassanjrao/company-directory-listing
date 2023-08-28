<?php

namespace App\Http\Livewire;

use App\Models\Recommendation;
use Livewire\Component;

class RecommentUs extends Component
{
    public $name;
    public $email;
    public $message;
    public $successMessage;

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];

    public function submit(){
        $this->validate();

        Recommendation::create([
            'name' => $this->name,
            'email' => $this->email,
            'message' => $this->message,
        ]);


        $this->reset();

        $this->successMessage = "Thank you for your recommendation!";

    }

    public function render()
    {
        return view('livewire.recomment-us');
    }
}
