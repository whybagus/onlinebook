<?php

namespace App\Libraries;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Sanitizer;

trait BaseApi
{
    public function model()
    {
        return null;
    }
    public function resource()
    {
        if (!$this->model()) {
            abort('403', 'Undefined Model.');
        }
        $model = $this->model();
        $resource = new $model();
        return $resource;
    }
    public function filters($model)
    {
        return $model;
    }
    protected function insertData($data)
    {
        $model = $this->model();
        if ($model::$filters) {
            $data = Sanitizer::make($data, $model::$filters)->sanitize();
        }
        return $data;
    }

    public function messages()
    {
        return [
            'store' => [
                'success' => Text::translate('store_success'),
                'error' =>  Text::translate('store_failed')
            ],
            'find' => [
                'success' =>  Text::translate('data_was_found'),
                'error' =>  Text::translate('data_is_not_exists')
            ],
            'update' => [
                'success' =>  Text::translate('updated!'),
                'error' =>  Text::translate('update_failed')
            ],
            'delete' => [
                'success' =>  Text::translate('data_deleted!'),
                'error' =>  Text::translate('deleted_failed')
            ]
        ];
    }
    public function validator($data)
    {
        $model = $this->model();
        if ($model::$rules) {
            return Validator::make($data, $model::$rules);
        }
        return true;
    }
    public function storeValidation($data)
    {
        return $this->validator($data);
    }
    public function updateValidator($data)
    {
        return $this->validator($data);
    }
    public function get()
    {
        $resource = $this->filters($this->resource());

        $result = $resource->get();
        return SendResponse::data($result);
    }
    public function find($id)
    {
        try {
            $result = $this->resource()->where('id', $id)->firstOrFail();
            return SendResponse::data($result);
        } catch (ModelNotFoundException $e) { {
                return $e->getMessage();
            }
        }
    }
    public function store(Request $request)
    {

        $input = $request->all();
        $validation = $this->storeValidation($input);
        if ($validation->fails()) {
            return SendResponse::validation($validation->errors());
        }
        try {
            $model = $this->resource();
            $result = $model::create($this->insertData($input));
            if ($result) {
                return SendResponse::data($result, $this->messages()['store']['success']);
            }
        } catch (\Throwable $th) {
            $message = [
                'message' => $this->messages()['store']['error'],
                'exception' => $th->getMessage()
            ];
            return SendResponse::error($message);
        }
    }
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validation = $this->storeValidation($input);
        if ($validation->fails()) {
            return SendResponse::validation($validation->errors());
        }
        $model = $this->resource()->where($this->resource()->getKeyName(), $id)->firstOrFail();
        try {
            $result = $model->update($this->insertData($input));
            if ($result) {
                return SendResponse::data($result, $this->messages()['update']['success']);
            }
        } catch (\Throwable $th) {
            $message = [
                'message' => $this->messages()['update']['error'],
                'exception' => $th->getMessage()
            ];
            return SendResponse::error($message);
        }
    }
    public function delete($id)
    {
        $resource = $this->resource()->where($this->resource()->getKeyName(), $id)
            ->firstOrFail();
        $result = $resource->delete();
        if ($result) {
            return SendResponse::success($this->messages()['delete']['success']);
        } else {
            return SendResponse::error($this->messages()['delete']['error']);
        }
    }
}
