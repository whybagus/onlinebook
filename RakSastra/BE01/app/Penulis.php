<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $table = 'penulis';
    public $timestamps = false;
    protected $fillable = ['nama', 'gender', 'deskripsi'];
    public static $rules = [
        'nama' => ['required', 'max:25'],
        'gender' => ['required'],
        'deskripsi' => ['required']
    ];
    public static $filters = [
        'nama' => 'capitalize',
    ];
}

