<?php

namespace App\Http\Controllers\Admin;

use App\Genre;
use App\Http\Controllers\Controller;
use App\Libraries\BaseApi;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    use BaseApi;
    public function model()
    {
        return Genre::class;
    }
}
