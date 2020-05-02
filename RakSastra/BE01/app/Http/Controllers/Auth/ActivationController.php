<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    public function activate(Request $request)
    {

        $user = User::where('email', $request->email)->where('activation_token', $request->token)->firstOrFail();
        $user->update([
            'email_verify' => true,
            'activation_token' => null
        ]);
        Auth::loginUsingId($user->id);
        return redirect()->route('get.admin');
        // return 'success';
    }
}
