<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, softDeletes;
    protected $table = 'reservations';
    protected $fillable = [
        'firstname',
        'lastname',
        'mobile_number',
        'email',
        'housenumber',
        'barangay',
        'city',
        'state',
        'controlnumber',
        'country',
        'themes_id',
        'price',
        'partial_price',
        'is_paid_full',
        'is_partial_paid',
        'is_done',
        'is_cancelled',
        'date_of_reservation',
        'time_of_reservation',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // protected $dates = ['created_at', 'updated_at', 'date_of_reservation'];

    public function fetchreservationwiththemes(){
        return $this->hasOne('App\Models\Theme', 'id', 'themes_id');
    }
}
