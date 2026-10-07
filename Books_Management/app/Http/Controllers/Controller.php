<?php

namespace App\Http\Controllers;

abstract class Controller
{

    public function success($data,$status,$message='success'){
        return response()->json([
            'data' => $data,
            'status' => $status,
            'message' => $message
        ]);


    }
}
