<?php

namespace App\Http\Traits;


use App\User;

trait ApiDesignTrait{

    public function ApiResponse($code = true , $message = null , $errors = null , $data = null){

        $array = [
            'status' => $code,
            'message' => $message,
        ];

        if(is_null($data) && !is_null($errors)){

            $array['errors'] = $errors;

        }elseif(!is_null($data) && is_null($errors)){

            $array['data'] = $data;
        }

        return response($array , 200);
    }



}
