<?php

namespace App\Http\Controllers\Admin;

use App\Buku;
use App\Http\Controllers\Controller;
use App\Libraries\BaseApi;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    use BaseApi;
    public function model()
    {
        return Buku::class;
    }
}
