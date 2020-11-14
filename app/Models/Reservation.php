<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'mobile_number',
        'email',
        'housenumber',
        'barangay',
        'city',
        'state',
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


}
