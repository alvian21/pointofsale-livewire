<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class Register extends Component
{

    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => ''
    ];

    public function render()
    {
        return view('livewire.auth.register');
    }

    public function register()
    {
        $this->validate([
            'form.name' => 'required|string|max:255',
            'form.email' => 'required|string|email|max:255|unique:users,email',
            'form.password' => 'required|string|min:8|confirmed',
            'form.password_confirmation' => 'required'
        ]);

        User::create([
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'password' => bcrypt($this->form['password']),
        ]);

        session()->flash('info', 'Register Successfully');
        redirect()->route('login');
    }
}
