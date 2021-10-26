<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class orderController extends Controller
{
    public function orders(Request $request){
        $_token = $request['_token'];
        return response()->json($request);
    }
}
