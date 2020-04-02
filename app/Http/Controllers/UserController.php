<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editPassword()
    {
        $this->authorize('editPassword', auth()->user());

        return view('users.edit-password');
    }

    public function updatePassword(UpdateFormRequest $request)
    {
        $this->authorize('editPassword', auth()->user());

        auth()->user()->password = Hash::make($request->get('password'));
        auth()->user()->save();

        return redirect()->route('home');
    }
}
