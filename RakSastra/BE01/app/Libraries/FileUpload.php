<?php

namespace App\Libraries;

use Validator;

class FileUpload
{

    protected $file;

    protected $uploaded = [];

    protected $validationErrors = [];

    public function process($file, $type = 'foto')
    {
        $this->file = $file;

        $validation = $this->validating($type);
        if ($validation->fails()) {
            $this->validationErrors = $validation->errors();
            return false;
        }

        $this->uploaded = $this->uploading();
        return true;
    }

    public function uploading()
    {
        $file = $this->file['file'];

        $file->store('public/temp');

        return [
            'filename' => $file->getClientOriginalName(),
            'filepath' => "public/temp/{$file->hashName()}"
        ];
    }

    protected function getRulesFromConfig($type)
    {
        return ['file' => config("upload-validation.$type")[0]];
    }

    public function validating($type)
    {
        return Validator::make($this->file, $this->getRulesFromConfig($type));
    }

    public function uploaded()
    {
        return $this->uploaded;
    }

    public function validationErrors()
    {
        return $this->validationErrors;
    }
}
