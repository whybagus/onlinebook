<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diskon extends Model
{
    protected $table = 'diskon';
    protected $fillable = ['id'];
    public $timestamps  = false;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'integer';
    public static $rules = [
        'id' => ['required']
    ];
}
