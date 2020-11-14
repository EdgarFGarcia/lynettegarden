<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllers extends Controller
{
    //
    public function wedding(){
        return view('wedding');
    }

    public function birthday(){
        return view('birthday');
    }

    public function social(){
        return view('social');
    }

    public function garden(){
        return view('garden');
    }
}
