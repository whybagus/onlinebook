<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Admin extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'admin';
    protected $fillable = [
        'nama_depan', 'nama_belakang', 'email', 'password',
        'no_tlp', 'tgl_lahir', 'alamat', 'facebook', 'instagram',
        'usia', 'gender', 'avatar', 'created_at', 'updated_at'
    ];
    protected $hidden = ['password', 'created_at', 'updated_at'];
    public static $rules = [
        'nama_depan' => ['required', 'max:25'],
        'nama_belakang' => ['required', 'max:25'],
        'email' => ['required', 'max:25'],
        'password' => ['required', 'max:25'],
        'no_tlp' => ['required', 'integer', 'max:25'],
        'tgl_lahir' => ['required',],
        'alamat' => ['required',],
        'usia' => ['integer', 'max:4'],
        'gender' => ['required'],
        'avatar' => ['required']
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
