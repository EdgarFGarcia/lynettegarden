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

    public function managereservation(){
        return view('managereservation');
    }

    public function managecancelrequest(){
        return view('managecancelrequest');
    }

    public function generatereports(){
        return view('generatereports');
    }

    public function cancellationconfirmation(){
        return view('cancellationconfirmation');
    }
}
