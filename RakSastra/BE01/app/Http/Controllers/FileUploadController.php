<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libraries\SendResponse;
use Facades\App\Libraries\FileUpload;

class FileUploadController extends Controller
{

    public function store(Request $request)
    {
        $upload = FileUpload::process($request->only('file'), $request->type);

        if ($upload) return SendResponse::data(FileUpload::uploaded());

        return SendResponse::validation(FileUpload::validationErrors());
    }
}
