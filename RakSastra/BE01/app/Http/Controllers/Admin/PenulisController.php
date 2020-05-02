<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Libraries\BaseApi;
use App\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    use BaseApi;
    public function model()
    {
        return Penulis::class;
    }
}
