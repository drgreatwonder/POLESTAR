<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    // public function store() {

    //     $user = User::create($this->Validator());

    //     $this->storeAvatar($user);

    //     return redirect('dashboard');
    // }

    // private function storeAvatar($user) {

    //     if(request()->has('avatar')) {

    //         $user->update([

    //             'avatar' => request()->avatar->store('avatars', 'public'),
    //         ]);
    //     }
    // }

    public function edit($id)
    {
        return view('edit', ['user' => User::find($id)]);
    }
}
