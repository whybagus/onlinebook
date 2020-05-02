<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Libraries\BaseApi;
use App\Libraries\SendResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
{
    use BaseApi;
    public function model()
    {
        return Admin::class;
    }
    protected function addAdmin(Request $request)
    {
        DB::table('admin')->insert([
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_tlp' => $request->no_tlp,
            'tgl_lahir' => $request->tgl_lahir,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'usia' => $request->usia,
            'gender' => $request->gender,
            'alamat' => $request->alamat,
        ]);

        return SendResponse::success();
    }
    protected function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        $validating = $this->validator($credentials);
        if ($validating->fails()) {
            return SendResponse::validation($validating->errors());
        }
        $token =  Auth::guard('admin')->attempt($credentials);
        if (!$token) {
           return SendResponse::error($message = 'unauthenticated');
        }
        $response = [
            'user' => auth()->guard('admin')->user(),
            'token' => $token,
        ];
        return SendResponse::data($response);
    }
    private function validator($request)
    {
        return Validator::make($request, [
            'email' => 'string|email|max:25',
            'password' => 'string',
        ]);
    }
    protected function logout()
    {
        JWTAuth::invalidate(JWTAuth::parseToken());

        return SendResponse::success($message = 'Logout success');
    }
    protected function get()
    {
        $data = Admin::all();

        return SendResponse::data($data);
    }
    protected function me(){
        return SendResponse::data(auth()->guard('admin')->user());
    }
}
