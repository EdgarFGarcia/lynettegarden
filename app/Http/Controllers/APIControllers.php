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
use Carbon\Carbon;
use Mail;
use Nexmo;

class APIControllers extends Controller
{
    //
    public $now;
    public function __construct(){
        $this->now = Carbon::now();
    }

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
            'firstname'         => 'sometimes|string',
            'lastname'          => 'sometimes|string',
            'dateofbirth'       => 'sometimes|date',
            'emailaddress'      => 'sometimes|email',
            'contactnumber'     => 'sometimes|numeric',
            'bldgno'            => 'sometimes|string',
            'barangay'          => 'sometimes|string',
            'city'              => 'sometimes|string',
            'state'             => 'sometimes|string',
            'country'           => 'sometimes|string',
            'date'              => 'sometimes|date',
            'time'              => 'sometimes'
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

        // TODO send email
        $to_name    = $request->firstname . " " . $request->lastname;
        $to_email   = $request->emailaddress;
        $data = array(
            "name"              => $request->firstname . " " . $request->lastname, 
            "partial"           => $partialprice, 
            "full_payment"      => $getprice[0]->price,
            "control_number"    => $controlnumber,
            "reservation_date"  => $request->date
        );
        Mail::send("emails.mail", $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("Partial / Full Payment Fulfillment");
        $message->from("lieraarciaga08@gmail.com","Partial / Full Payment Fulfillment");
        });

        Nexmo::message()->send([
            'to'   => '639063504121',
            'from' => 'Vonage APIs',
            'text' => 'Hi There! An email has been sent to ' . $request->emailaddress . ' and here is your control number ' . $controlnumber . ' Thank you!'
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
                            ->where('a.is_cancelled', 0)
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

    public function getreservationcount(){
        return response()->json([
            'response'      => true,
            'data'          => Reservation::whereBetween('date_of_reservation', [$this->now->startOfMonth()->format("Y-m-d"), $this->now->endOfMonth()->format("Y-m-d")])->whereNull('deleted_at')->get()->count()
        ], 200);
    }

    public function getcancelledreservation(){
        return response()->json([
            'response'      => true,
            'data'          => Reservation::whereBetween('date_of_reservation', [$this->now->startOfMonth()->format("Y-m-d"), $this->now->endOfMonth()->format("Y-m-d")])->onlyTrashed()->get()->count()
        ], 200);
    }

    public function getconfirmedreservation(){
        return response()->json([
            'response'      => true,
            'data'          => Reservation::whereBetween('date_of_reservation', [$this->now->startOfMonth()->format("Y-m-d"), $this->now->endOfMonth()->format("Y-m-d")])->whereNull('deleted_at')->where('is_paid_full', 1)->where('is_partial_paid', 1)->get()->count()
        ], 200);
    }

    public function fetchmanagereservation(){
        $getdata = Reservation::with(['fetchreservationwiththemes'])->get();
        $data = [];
        foreach($getdata as $out){
            $data[] = [
                'id'                => $out->id,
                'name'              => $out->firstname . " " . $out->lastname,
                'mobile'            => $out->mobile_number,
                'email'             => $out->email,
                'control_number'    => $out->controlnumber,
                'theme'             => $out->fetchreservationwiththemes->name,
                'price'             => $out->price,
                'partial_price'     => $out->partial_price,
                'is_paid_full'      => $out->is_paid_full == 0 ? "No" : "Yes",
                'is_paid_partial'   => $out->is_partial_paid == 0 ? "No" : "Yes",
                'is_done'           => $out->is_done == 0 ? "No" : "Yes"
            ];
        }

        return response()->json([
            'response'          => true,
            'data'              => $data
        ], 200);
    }

    public function getthisrecord(Request $request){
        $getdata = Reservation::with(['fetchreservationwiththemes'])->where('id', $request->id)->first();

        $data = [
            'id'                => $getdata->id,
            'name'              => $getdata->firstname . ' ' . $getdata->lastname,
            'mobile'            => $getdata->mobile_number,
            'email'             => $getdata->email,
            'control_number'    => $getdata->controlnumber,
            'theme'             => $getdata->fetchreservationwiththemes->name,
            'price'             => $getdata->price,
            'partial_price'     => $getdata->partial_price,
            'is_paid_full'      => $getdata->is_paid_full == 0 ? "No" : "Yes",
            'is_paid_partial'   => $getdata->is_partial_paid == 0 ? "No" : "Yes",
            'is_done'           => $getdata->is_done == 0 ? "No" : "Yes"
        ];

        return response()->json([
            'response'          => true,
            'data'              => $data
        ], 200);

    }

    public function updatereservationinformation(Request $request){
        if($request->ispaidfull == "true"){

            $checkdata = Reservation::where('id', $request->id)->get();

            if($checkdata[0]->is_paid_full != 1){
                Reservation::where('id', $request->id)
                ->update([
                    'is_paid_full'          => 1
                ]);
    
                $clientdata = Reservation::where('id', $request->id)->get();
                $to_name    = $clientdata[0]->firstname . " " . $clientdata[0]->lastname;
                $to_email   = $clientdata[0]->email;
                $data = array(
                    "name"              => $clientdata[0]->firstname . " " . $clientdata[0]->lastname,
                    'control_number'    => $clientdata[0]->controlnumber,
                    'amount'            => $clientdata[0]->price
                );
                Mail::send("emails.fullpayment", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject("Full Payment Received");
                $message->from("lieraarciaga08@gmail.com","Full Payment Received");
                });
            }

        }else{
            Reservation::where('id', $request->id)
            ->update([
                'is_paid_full'          => 0
            ]);
        }

        if($request->ispaidpartial == "true"){

            $checkdata = Reservation::where('id', $request->id)->get();

            if($checkdata[0]->is_partial_paid != 1){
                Reservation::where('id', $request->id)
                ->update([
                    'is_partial_paid'       => 1
                ]);

                $clientdata = Reservation::where('id', $request->id)->get();
                $to_name    = $clientdata[0]->firstname . " " . $clientdata[0]->lastname;
                $to_email   = $clientdata[0]->email;
                $data = array(
                    "name"              => $clientdata[0]->firstname . " " . $clientdata[0]->lastname,
                    'control_number'    => $clientdata[0]->controlnumber,
                    'amount'            => $clientdata[0]->partial_price
                );
                Mail::send("emails.partial", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject("Partial Payment");
                $message->from("lieraarciaga08@gmail.com","Partial Payment");
                });
            }

        }else{
            Reservation::where('id', $request->id)
            ->update([
                'is_partial_paid'       => 0
            ]);
        }

        if($request->isdone == "true"){

            $checkdata = Reservation::where('id', $request->id)->get();

            if($checkdata[0]->is_done != 1){
                Reservation::where('id', $request->id)
                ->update([
                    'is_done'               => 1
                ]);

                $clientdata = Reservation::where('id', $request->id)->get();
                $to_name    = $clientdata[0]->firstname . " " . $clientdata[0]->lastname;
                $to_email   = $clientdata[0]->email;
                $data = array(
                    "name"              => $clientdata[0]->firstname . " " . $clientdata[0]->lastname,
                    'control_number'    => $clientdata[0]->controlnumber,
                    'amount'            => $clientdata[0]->partial_price
                );
                Mail::send("emails.done", $data, function($message) use ($to_name, $to_email) {
                $message->to($to_email, $to_name)
                ->subject("Done Transaction");
                $message->from("lieraarciaga08@gmail.com","Done Transaction");
                });
            }

        }else{
            Reservation::where('id', $request->id)
            ->update([
                'is_done'               => 0
            ]);
        }

        return response()->json([
            'response'                  => true,
            'message'                   => "Update Successful"
        ], 200);
    }

    public function deletethisreservation(Request $request){
        $data = Reservation::where('id', $request->id)->delete();
        if($data){
            return response()->json([
                'response'              => true,
                'message'               => "Successfully deleted"
            ], 200);
        }else{
            return response()->json([
                'response'              => false,
                'message'               => "There's an error deleting this record"
            ], 200);
        }
    }

    public function fetchcancelrequest(){
        $cancelrequest = Reservation::with(['fetchreservationwiththemes'])->where('is_cancelled', 1)->get();
        $data = [];
        foreach($cancelrequest as $out){
            $data[] = [
                'id'                    => $out->id,
                'name'                  => $out->firstname . " " . $out->lastname,
                'mobile'                => $out->mobile_number,
                'email'                 => $out->email,
                'control_number'        => $out->controlnumber,
                'theme'                 => $out->fetchreservationwiththemes->name,
                'price'                 => $out->price,
                'partial_price'         => $out->partial_price,
                'is_paid_full'          => $out->is_paid_full == 0 ? "No" : "Yes",
                'is_paid_partial'       => $out->is_partial_paid == 0 ? "No" : "Yes",
                'is_done'               => $out->is_done == 0 ? "No" : "Yes",
                'date_of_reservation'   => $out->date_of_reservation,
                'time_of_reservation'   => $out->time_of_reservation
            ];
        }
        return response()->json([
            'response'                  => true,
            'data'                      => $data
        ], 200);
    }

    public function tobecancelled(){
        $cancelrequest = Reservation::with(['fetchreservationwiththemes'])->where('is_cancelled', 1)->where('is_email_sent', 0)->onlyTrashed()->get();
        $data = [];
        foreach($cancelrequest as $out){
            $data[] = [
                'id'                    => $out->id,
                'name'                  => $out->firstname . " " . $out->lastname,
                'mobile'                => $out->mobile_number,
                'email'                 => $out->email,
                'control_number'        => $out->controlnumber,
                'theme'                 => $out->fetchreservationwiththemes->name,
                'price'                 => $out->price,
                'partial_price'         => $out->partial_price,
                'is_paid_full'          => $out->is_paid_full == 0 ? "No" : "Yes",
                'is_paid_partial'       => $out->is_partial_paid == 0 ? "No" : "Yes",
                'is_done'               => $out->is_done == 0 ? "No" : "Yes",
                'date_of_reservation'   => $out->date_of_reservation,
                'time_of_reservation'   => $out->time_of_reservation,
                'date_of_cancellation'  => date_format($out->deleted_at,"Y/m/d H:i:s")
            ];
        }
        return response()->json([
            'response'                  => true,
            'data'                      => $data
        ], 200);
    }

    public function confirmcancellation(Request $request){
        $updaterecord = DB::table('reservations')->where('id', $request->id)
        ->update([
            'is_email_sent'             => 1
        ]);

        $searchuser = DB::table('reservations')
        ->where('id', $request->id)
        ->get()->first();

        $to_name    = $searchuser->firstname . " " . $searchuser->lastname;
        $to_email   = $searchuser->email;
        $data = array(
            "name"              => $searchuser->firstname . " " . $searchuser->lastname,
            'control_number'    => $searchuser->controlnumber
        );
        Mail::send("emails.cancelledreservation", $data, function($message) use ($to_name, $to_email) {
        $message->to($to_email, $to_name)
        ->subject("Cancellation Of Reservation");
        $message->from("lieraarciaga08@gmail.com","Cancellation Of Reservation");
        });

        return response()->json([
            'response'                  => true,
            'message'                   => "Sending Email Notification was a success"
        ], 200);

    }

    /**
     * 
     * Generate Reports
     */
    public function generatereport(){
        $data = Reservation::where('is_paid_full', 1)->get();
        
        $total = [];

        foreach($data as $out){
            $total[] = $out->price;
        }

        $datas = [];
        foreach($data as $out){
            $datas[] = [
                'id'                    => $out->id,
                'name'                  => $out->firstname . " " . $out->lastname,
                'mobile'                => $out->mobile_number,
                'email'                 => $out->email,
                'control_number'        => $out->controlnumber,
                'theme'                 => $out->fetchreservationwiththemes->name,
                'price'                 => $out->price,
                'partial_price'         => $out->partial_price,
                'is_paid_full'          => $out->is_paid_full == 0 ? "No" : "Yes",
                'is_paid_partial'       => $out->is_partial_paid == 0 ? "No" : "Yes",
                'is_done'               => $out->is_done == 0 ? "No" : "Yes",
                'date_of_reservation'   => $out->date_of_reservation,
                'time_of_reservation'   => $out->time_of_reservation
            ];
        }

        $totalvalue = array_sum($total);
        return response()->json([
            'response'              => true,
            'data'                  => $datas,
            'total'                 => number_format(($totalvalue), 2, '.', ',')
        ], 200);

    }

    public function searchthisreport(Request $request){
        $data = Reservation::where('is_paid_full', 1)->whereBetween('date_of_reservation', [$request->startdate, $request->enddate])->get();
        
        $total = [];

        foreach($data as $out){
            $total[] = $out->price;
        }

        $datas = [];
        foreach($data as $out){
            $datas[] = [
                'id'                    => $out->id,
                'name'                  => $out->firstname . " " . $out->lastname,
                'mobile'                => $out->mobile_number,
                'email'                 => $out->email,
                'control_number'        => $out->controlnumber,
                'theme'                 => $out->fetchreservationwiththemes->name,
                'price'                 => $out->price,
                'partial_price'         => $out->partial_price,
                'is_paid_full'          => $out->is_paid_full == 0 ? "No" : "Yes",
                'is_paid_partial'       => $out->is_partial_paid == 0 ? "No" : "Yes",
                'is_done'               => $out->is_done == 0 ? "No" : "Yes",
                'date_of_reservation'   => $out->date_of_reservation,
                'time_of_reservation'   => $out->time_of_reservation
            ];
        }

        $totalvalue = array_sum($total);
        return response()->json([
            'response'              => true,
            'data'                  => $datas,
            'total'                 => number_format(($totalvalue), 2, '.', ',')
        ], 200);
    }

    public function getarchivereport(){
        $data = Reservation::onlyTrashed()->get();

        $datas = [];

        foreach($data as $out){
            $datas[] = [
                'id'                    => $out->id,
                'name'                  => $out->firstname . " " . $out->lastname,
                'mobile'                => $out->mobile_number,
                'email'                 => $out->email,
                'control_number'        => $out->controlnumber,
                'theme'                 => $out->fetchreservationwiththemes->name,
                'price'                 => $out->price,
                'partial_price'         => $out->partial_price,
                'is_paid_full'          => $out->is_paid_full == 0 ? "No" : "Yes",
                'is_paid_partial'       => $out->is_partial_paid == 0 ? "No" : "Yes",
                'is_done'               => $out->is_done == 0 ? "No" : "Yes",
                'date_of_reservation'   => $out->date_of_reservation,
                'time_of_reservation'   => $out->time_of_reservation
            ];
        }

        return response()->json([
            'response'              => true,
            'data'                  => $datas
        ], 200);

    }

    /**
     * Auto revoke
     */
    public function autorevoke(){
        $data = Reservation::where('date_of_reservation', '<', Carbon::now()->subDay())->where('is_done', 0)->where('is_paid_full', 0)->where('is_partial_paid', 0)->get();
        foreach($data as $out){
            $deleterecord = Reservation::where('id', $out->id)->delete();
            $updaterecord = DB::table('reservations')->where('id', $out->id)->update([
                'is_email_sent'         => 1
            ]);
            $to_name = $out->mobilenumber;
            $to_email = $out->email;
            $data = array(
                "name"              => "Hi There", 
                "control_number"    => $out->control_number,
            );
            Mail::send("emails.cancelledreservation", $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
            ->subject("Booking Revoke");
            $message->from("lieraarciaga08@gmail.com","Booking Revoke");
            });
        }

        return response()->json([
            'response'          => true
        ], 200);
    }

}
