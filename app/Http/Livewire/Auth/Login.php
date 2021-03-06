<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{

    public $form = [
        'email' => '',
        'password' => ''
    ];

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function submit()
    {
        $this->validate([
            'form.email' => 'required|email',
            'form.password' => 'required'
        ]);

        //cek user
        $cek = User::where('email', $this->form['email'])->count();

        if ($cek == 1 && Auth::attempt($this->form)) {
            redirect()->route('home');
        } else {
            session()->flash('error', 'Wrong email or password');
        }
        
    }
}
