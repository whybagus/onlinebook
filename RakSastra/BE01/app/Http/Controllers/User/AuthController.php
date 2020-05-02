<?php

namespace App\Http\Controllers\User;

use App\Events\Auth\UserActivationEmail;
use App\Http\Controllers\Controller;
use App\Libraries\BaseApi;
use App\Libraries\SendResponse;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    use BaseApi;
    protected function register(Request $request)
    {
        $validating = $this->validator($request->all());
        if ($validating->fails()) {
            return SendResponse::validation($validating->errors());
        }
        $create = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'provinsi' => $request->provinsi,
            'kota' => $request->kota,
            'email_verify' => false,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'activation_token' => Str::random(255),
        ]);
        if (!$create) {
            return SendResponse::error($this->messages()['store']['error']);
        }
        $activation = $this->registered($create);
        if (!$activation) {
            return SendResponse::error();
        }
        return SendResponse::success($this->messages()['store']['success']);
    }
    private function validator($data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'no_tlp' => ['integer', 'max:999999999999999'],
            'provinsi' => ['string', 'max:20'],
            'kota' => ['string', 'max:20'],
            'password' => ['required', 'string', 'min:8',],
            'avatar' => ['string', 'max:170'],
        ]);
    }
    private function registered($user)
    {
        $send = event(new UserActivationEmail($user));

        if (!$send) {
            return SendResponse::error();
        }
        return true;
    }
    protected function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $validating = Validator::make($credentials, [
            'email' => [
                'string', 'email', 'max:25', Rule::exists('users')->where(function ($query) {
                    $query->where('email_verify', true);
                })
            ],
            'password' => 'string|max:25',
        ]);
        if ($validating->fails()) {
            return SendResponse::validation($validating->errors());
        }
        $token = Auth::guard('user')->attempt($credentials);
        return $this->responseLogin($token);
    }
    private function responseLogin($token)
    {
        $response = [
            'user' => auth()->guard('user')->user(),
            'token' => $token
        ];
        return SendResponse::data($response, $message = 'Login success!');
    }
    protected function logout()
    {
        JWTAuth::invalidate(JWTAuth::parseToken());

        return SendResponse::success($message = 'Logout success');
    }
}
