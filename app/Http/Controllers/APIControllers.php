<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Position;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Theme;
use Validator;
use Hash;
use DB;

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

    public function getthemeswedding(){
        return response()->json([
            'response'      => true,
            'data'          => Theme::where('category_id', 1)->get()
        ], 200);
        // Theme::where('category_id', 1)->get();
    }

    public function getbirthdaythemes(){
        return response()->json([
            'response'      => true,
            'data'          => Theme::where('category_id', 2)->get()
        ], 200);
    }

    public function getsocialgathering(){
        return response()->json([
            'response'      => true,
            'data'          => Theme::where('category_id', 4)->get()
        ], 200);
    }

    public function getgardenevents(){
        return response()->json([
            'response'      => true,
            'data'          => Theme::where('category_id', 3)->get()
        ], 200);
    }

    public function checkdatetimeavailability(Request $request){

        $validation = Validator::make($request->all(),[
            'date'      => 'required|date',
            'time'      => 'required'
        ]);

        if($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'      => false,
                'message'       => $error
            ], 200);
        }

        $checkifavailable = Reservation::where('date_of_reservation', $request->date)->get();

        if(sizeof($checkifavailable) < 3){
            $checktime = Reservation::where('time_of_reservation', $request->time)->get();
            return response()->json([
                'response'      => true,
                'message'       => "Available Date And Time"
            ], 200);
        }

    }

    public function makereservation(Request $request){
        $validation = Validator::make($request->all(), [
            'firstname'         => 'required|string',
            'lastname'          => 'required|string',
            'dateofbirth'       => 'required|date',
            'emailaddress'      => 'required|email',
            'contactnumber'     => 'required|numeric',
            'bldgno'            => 'required|string',
            'barangay'          => 'required|string',
            'city'              => 'required|string',
            'state'             => 'required|string',
            'country'           => 'required|string',
            'date'              => 'required|date',
            'time'              => 'required'
        ]);
        
        if($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'      => false,
                'message'       => $error
            ], 200);
        }

        $forcontrolnumber = date("Y-m-d H:i:s");
        $trimspaces = str_replace(' ', '', $forcontrolnumber);
        $trimdash = str_replace('-', '', $trimspaces);
        $controlnumber = str_replace(':', '', $trimdash);

        $getprice = Theme::where('id', $request->themeid)->get();
        $partialprice = $getprice[0]->price / 2;
        $savedata = Reservation::create([
            'firstname'             => $request->firstname,
            'lastname'              => $request->lastname,
            'mobile_number'         => $request->contactnumber,
            'email'                 => $request->emailaddress,
            'housenumber'           => $request->bldgno,
            'barangay'              => $request->barangay,
            'city'                  => $request->city,
            'state'                 => $request->state,
            'country'               => $request->country,
            'themes_id'             => $request->themeid,
            'price'                 => $getprice[0]->price,
            'partial_price'         => $partialprice,
            'date_of_reservation'   => $request->date,
            'time_of_reservation'   => $request->time,
            'controlnumber'         => $controlnumber
        ]);

        if($savedata){
            return response()->json([
                'response'          => true,
                'message'           => "Successful Reservation",
                'data'              => $savedata
            ], 200);
        }

    }

    public function searchthiscontrolnumber(Request $request){
        $validation = Validator::make($request->all(),[
            'controlnumber'     => 'required|numeric'
        ]);

        if($validation->fails()){
            $error = $validation->messages()->first();
            return response()->json([
                'response'      => false,
                'message'       => $error
            ], 200);
        }

        return response()->json([
            'response'      => true,
            'data'          => DB::connection('mysql')
                            ->table('reservations as a')
                            ->select(
                                'a.id as id',
                                'a.controlnumber as controlnumber',
                                DB::raw("CONCAT(a.firstname, ' ', a.lastname) as name"),
                                DB::raw("DATE_FORMAT(a.date_of_reservation, '%D of %M %Y') as reservationdate"),
                                'a.email as email',
                                'a.mobile_number as mobilenumber',
                                'b.name as themename',
                                // 'b.price as themeprice',
                                // 'a.partial_price as partialprice'
                                DB::raw("FORMAT(b.price, 2) as themeprice"),
                                DB::raw("FORMAT(a.partial_price, 2) as partialprice")
                            )
                            ->join('themes as b', 'a.themes_id', '=', 'b.id')
                            ->where('a.controlnumber', $request->controlnumber)
                            ->get()->first()
        ]);
    }

    public function cancelreservation(Request $request){
        return response()->json([
            'response'          => true,
            'data'              => Reservation::where('id', (int)$request->id)
                                ->update([
                                    'is_cancelled'      => 1,
                                    'updated_at'        => date("Y-m-d H:i:s")
                                ]),
            'message'           => "Cancellation Request Sent"
        ]);
    }
}
