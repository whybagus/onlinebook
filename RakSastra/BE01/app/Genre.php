<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genre';
    protected $fillable = ['id'];
    public $timestamps  = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    public static $rules = [
        'id' => ['required']
    ];
    public static $filters = [
        'id' => 'capitalize',
    ];
}
