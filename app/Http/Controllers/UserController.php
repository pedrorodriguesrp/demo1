<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;

class UserController extends Controller
{
    public function showChangePassword()
    {
        return view('user.changePassword');
    }

    public function changePassword(\App\Http\Requests\NewUser $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            return redirect()->back()->with("error","A password fornecida não corresponde com a sua password actual. Tente novamente.");
        }
        if(strcmp($request->get('password'), $request->get('password_confirmation')) == 1){
            return redirect()->back()->with("error","A sua password de confirmação não é igual a nova password. Tente novamente.");
        }

        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect()->back()->with("success","Password alterada com sucesso!");
    }
}
