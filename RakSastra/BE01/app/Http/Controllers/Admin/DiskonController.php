<?php

namespace App\Http\Controllers\Admin;

use App\Diskon;
use App\Http\Controllers\Controller;
use App\Libraries\BaseApi;
use Illuminate\Http\Request;

class DiskonController extends Controller
{
    use BaseApi;
    public function model()
    {
        return Diskon::class;
    }
}
