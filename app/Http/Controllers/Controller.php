<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public static function api_response($code, $message, $data=null){
        return [
            'code' => $code,
            'message' => $message,
            'data' => $data
        ];
    }
}
