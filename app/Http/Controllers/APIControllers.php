<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Position;
use App\Models\User;
use Validator;
use Hash;

class APIControllers extends Controller
{
    //
    public function getpositions(){
        $data = Position::get();
        return response()->json([
            'response'      => true,
            'data'          => $data
        ], 200);
    }

    public function adduser(Request $request){
        $validation = Validator::make($request->all(), [
            'first_name'        => 'required|string',
            'last_name'         => 'required|string',
            'email'             => 'required|email|unique:users,email',
            'positions_id'      => 'required|numeric'
        ]);

        if($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'      => false,
                'message'       => $error
            ], 200);
        }

        $generatepassword = trim($request->first_name, ' ') . trim($request->last_name, ' ');

        $insertuser = User::create([
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'email'             => $request->email,
            'positions_id'      => $request->positions_id,
            'password'          => Hash::make($generatepassword)
        ]);

        return response()->json([
            'response'  => true,
            'message'   => "Successfully Added A New User!"
        ], 200);
    }

    public function fetchusers(){
        $data = User::fetchuserswithpositions();
        if($data){
            return response()->json([
                'response'      => true,
                'data'          => $data
            ], 200);
        }

        return response()->json([
            'response'          => false,
            'data'              => []
        ], 200);
    }

    public function getthisuser(Request $request){
        $data = User::where('id', $request->id)->get()->first();
        return response()->json([
            'response'      => true,
            'data'          => $data
        ], 200);
    }

    public function edituser(Request $request){
        if($request->userid > ''){
            $user = User::where('id', $request->userid)->get()->first();
        }else{
            return response()->json([
                'response'  => false,
                'message'   => "Empty Set"
            ], 200);
        }
        $validation = Validator::make($request->all(),[
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'positions_id'  => 'required|numeric',
            'email'         => 'required|email|unique:users,email,' . $user->id
        ]);
        if($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'      => false,
                'message'       => $error
            ], 200);
        }

        $updaterecord = User::where('id', $request->userid)
        ->update([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'positions_id'  => $request->positions_id
        ]);

        return response()->json([
            'response'      => true,
            'message'       => "Editing User Successful!"
        ], 200);
    }

    public function deletethisuser(Request $request){
        return response()->json([
            'response'      => true,
            'data'          => User::where('id', $request->id)->delete(),
            'message'       => "Deleting User Successful"
        ], 200);
    }
}
