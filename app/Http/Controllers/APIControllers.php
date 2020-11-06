<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIControllers extends Controller
{
    //
    public function loginpost(Reqeuest $request){
        return $request->all();
    }
}
